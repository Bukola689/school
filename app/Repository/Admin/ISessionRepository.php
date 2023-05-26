<?php

namespace App\Repository\Admin;

use App\Models\Session;
use Illuminate\Http\Request;

interface ISessionRepository
{
    public function saveSession(Request $request, array $data);

     public function updateSession(Request $request, Session $session, array $data);

     public function removeSession(Session $session);
}