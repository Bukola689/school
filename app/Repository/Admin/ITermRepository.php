<?php

namespace App\Repository\Admin;

use App\Models\Term;
use Illuminate\Http\Request;

interface ITermRepository
{
    public function saveTerm(Request $request, array $data);

     public function updateTerm(Request $request, Term $term, array $data);

     public function removeTerm(Term $term);
}