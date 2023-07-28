<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HistoriesExport;
use App\Models\Rent;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HistoryExport;
use PDF;


class HistoryController extends Controller
{
    public function index()
    {
        $pageTitle = 'History';
        $histories = Rent::has('return_rent')->get();

        return view('history.index', [
            'pageTitle' => $pageTitle,
            'histories' => $histories
        ]);
    }


    public function exportExcel()
    {
        return Excel::download(new HistoriesExport, 'history.xlsx');
    }

    // public function exportExcel()
    // {
    //     return Excel::download(new HistoryExport, 'history.xlsx');
    // }

    public function exportPdf()
    {
        $histories = Rent::has('return_rent')->get();

        $pdf = PDF::loadView('history.export_pdf', compact('histories'));

        return $pdf->download('history.pdf');
    }
}







