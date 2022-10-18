<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentHostelController extends Controller
{
    public function viewHostel()
    {
       $id = Auth::id();

       $studentHostel = Hostel::where('id', $id)->get();

       return response()->json([
        'status' => true,
        'Hostel' => $studentHostel
       ]);
    }
}
