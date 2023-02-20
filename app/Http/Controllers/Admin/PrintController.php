<?php

namespace App\Http\Controllers\Admin;


use PDF;
use App\Models\Sidi;
use App\Models\Sector;
use App\Models\Married;
use App\Models\FamilyMember;
// use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

            $year = $request->year;
            $pdf = PDF::loadView('dashboard.print.print', compact('datas', 'year'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        } elseif($request->data == 'Kawin') {
            $datas = Married::whereHas('families', (function ($query) {
                global $request;
                return $query->where('sector_id', $request->sector)->where('tahun', $request->year);
            }))->get();

            $year = $request->year;
            $pdf = PDF::loadView('dashboard.print.married', compact('datas', 'year'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        } elseif($request->data == 'Sidi') {
            $datas = Sidi::whereHas('families', (function ($query) {
                global $request;
                return $query->where('sector_id', $request->sector)->where('tahun', $request->year);
            }))->get();

            $year = $request->year;
            $pdf = PDF::loadView('dashboard.print.sidi', compact('datas', 'year'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        }
    }
}
