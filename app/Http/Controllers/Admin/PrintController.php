<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use App\Models\Sector;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;

class PrintController extends Controller
{
    public function index()
    {
        $sectors = Sector::all();
        return view('dashboard.print.index', compact('sectors'));
    }

    public function print(Request $request)
    {
        $validate = $request->validate([
            'data' => 'required',
            'year' => 'required',
            'sector' => 'required',
        ]);
        if($request->data == 'Jemaat') {
            $datas = FamilyMember::whereHas('families', (function ($query) {
                global $request;
                return $query->where('sector_id', $request->sector)->where('tahun', $request->year);
            }))->get();
        }
        $year = $request->year;
        $pdf = PDF::loadView('dashboard.print.print', compact('datas', 'year'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
