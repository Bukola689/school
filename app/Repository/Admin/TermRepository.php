<?php

namespace App\Repository\Admin;

use App\Models\Term;
use Illuminate\Http\Request;

class TermRepository implements ITermRepository
{
    public function saveTerm(Request $request, array $data)
    {
        $term = new Term;
        $term->section = $request->input('section');
        $term->save();
    }

     public function updateTerm(Request $request, Term $term, array $data)
     {
        $term->section = $request->input('section');
        $term->update();
     }

     public function removeTerm(Term $term)
     {
        $term = $term->delete();
     }
}