<?php

namespace App\Repository\Admin\Marksheet;

use App\Models\Marksheet;
use Illuminate\Http\Request;

interface IMarksheetRepository
{
    public function saveMarksheet(Request $request, array $data);

     public function updateMarksheet(Request $request, Marksheet $markSheet, array $data);

     public function removeMarksheet(Marksheet $markSheet);
}