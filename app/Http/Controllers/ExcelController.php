<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export($pasar_id, $tgl)
    {
        return Excel::download(new ReportExport($pasar_id, $tgl), 'Report.xlsx');
    }
}
