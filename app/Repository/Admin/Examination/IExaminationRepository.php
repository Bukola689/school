<?php

namespace App\Repository\Admin\Examination;

use App\Models\Examination;
use Illuminate\Http\Request;

interface IExaminationRepository
{
    public function saveExamination(Request $request, array $data);

     public function updateExamination(Request $request, Examination $examination, array $data);

     public function removeExamination(Examination $examination);
}