<?php

namespace App\Repository\Admin;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionRepository implements ISessionRepository
{
    public function saveSession(Request $request, array $data)
    {
        $session = new Session;
        $session->sec_year = $request->input('sec_year');
        $session->save();
    }

     public function updateSession(Request $request, Session $session, array $data)
     {
        $session->sec_year = $request->input('sec_year');
        $session->update();

     }

     public function removeSession(Session $session)
     {
        $session = $session->delete();
     }
}