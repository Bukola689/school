<?php

namespace App\Repository\Admin\ReportCard;

use App\Models\ReportCard;
use Illuminate\Http\Request;

interface IReportcardRepository
{
    public function saveReportCard(Request $request, array $data);

     public function updateReportCard(Request $request, ReportCard $reportCard, array $data);

     public function removeReportCard(ReportCard $reportCard);
}