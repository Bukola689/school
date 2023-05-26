<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Session;
use App\Http\Resources\SessionResource;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Repository\Admin\SessionRepository;
use Illuminate\Support\Facades\Cache;

class SessionController extends Controller
{

    public $session;

    public function __construct(SessionRepository $session)
    {
        $this->session = $session;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Cache::remember('sessions', 60, function () {
            return Session::orderBy('created_at', 'DESC')->get();
        });

        if($sessions->isEmpty()) {
            return response()->json('Session Is Empty');
        }

        return SessionResource::Collection($sessions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSessionRequest $request)
    {
      
        $data = $request->all();

        $this->session->saveSession($request, $data);

        cache()->forget('session:all');

        return response()->json([
            'message' => 'Session Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = Session::find($id);

        if(! $session) {
            return response()->json('Session Not Found');
        }

        $sessionShow = cache()->rememberForever('session:'. $session->id, function () use($session) {
            return $session;
        });

        return new SessionResource($sessionShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSessionRequest  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSessionRequest $request, $id)
    {
        $session = Session::find($id);

        if(! $session) {
            return response()->json('Session Not Found');
        }

        $data = $request->all();

        $this->session->updateSession($request, $session, $data);

        cache()->forget('session:'. $session->id);
        cache()->forget('session:all');

        return response()->json([
            'message' => 'Session Updated Successfully'
        ]);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::find($id);

        if(! $session) {
            return response()->json('Session Not Found');
        }
        
        $this->session->removeSession($session);
        
        cache()->forget('session:'. $session->id);
        cache()->forget('session:all');

        return response()->json([
            'message' => 'Session deleted successfully !'
        ]);
    }
}
