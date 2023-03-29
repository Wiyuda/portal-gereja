<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FamilyMemberExport;
use PDF;
use App\Models\Sidi;
use App\Models\Sector;
use App\Models\Baptism;
use App\Models\Married;
use App\Models\Monding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\goOut;
use App\Models\Shift;
use Maatwebsite\Excel\Facades\Excel;

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
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $sectorsName = Sector::where('id', $request->sector)->first();

        $start = $validate['start'] . " " . "00:00:00";
        $end = $validate['end'] . " " . "23:59:59";

        if($request->data == 'Jemaat') {

            return Excel::download(new FamilyMemberExport($request), 'jemaat.xlsx');
        } elseif($request->data == 'Kawin') {
            if($request->sector == 'All') {
                $datas = Married::whereBetween('created_at', [$start, $end])->get();
            } else {
                $datas = Married::whereBetween('created_at', [$start, $end])->whereHas('families', (function($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector);
                }))->get();
            }
            $pdf = PDF::loadView('dashboard.print.married', compact('datas'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        } elseif($request->data == 'Sidi') {
            if($request->sector == 'All') {
                $datas = Sidi::whereBetween('created_at', [$start, $end])->get();
            } else {
                $datas = Sidi::whereBetween('created_at', [$start, $end])->whereHas('families', (function($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector);
                }))->get();
            }
            $pdf = PDF::loadView('dashboard.print.sidi', compact('datas'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        } elseif ($request->data == 'Monding') {
            if($request->sector == 'All') {
                $datas = Monding::whereBetween('created_at', [$start, $end])->get();
            } else {
                $datas = Monding::whereBetween('created_at', [$start, $end])->whereHas('families', (function($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector);
                }))->get();
            }
            $pdf = PDF::loadView('dashboard.print.monding', compact('datas'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        } elseif ($request->data == 'Baptis') {
            if($request->sector == 'All') {
                $datas = Baptism::whereBetween('created_at', [$start, $end])->get();
            } else {
                $datas = Baptism::whereBetween('created_at', [$start, $end])->whereHas('families', (function($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector);
                }))->get();
            }
            $pdf = PDF::loadView('dashboard.print.baptis', compact('datas'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        } elseif($request->data == 'Pindah') {
            if($request->sector == 'All') {
                $datas = Shift::whereBetween('created_at', [$start, $end])->get();
            } else {
                $datas = Shift::whereBetween('created_at', [$start, $end])->whereHas('families', (function($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector);
                }))->get();
            }
            $pdf = PDF::loadView('dashboard.print.shift', compact('datas'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        } elseif($request->data = 'Keluar') {
            if($request->sector == 'All') {
                $datas = goOut::whereBetween('created_at', [$start, $end])->get();
            } else {
                $datas = goOut::whereBetween('created_at', [$start, $end])->whereHas('families', (function($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector);
                }))->get();
            }
            $pdf = PDF::loadView('dashboard.print.out', compact('datas'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        }
    }
}