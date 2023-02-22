<?php

namespace App\Http\Controllers\Admin;


use PDF;
use App\Models\Sidi;
use App\Models\Sector;
use App\Models\Baptism;
use App\Models\Married;
use App\Models\Monding;
use App\Models\FamilyMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintController extends Controller
{
    public function index()
    {
        $sectors = Sector::all();
        $years = ['All', '2020', '2021', '2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030', '2031', '2032', '2033', '2034', '2035', '2036', '2037', '2038', '2039', '2040'];
        return view('dashboard.print.index', compact('sectors', 'years'));
    }

    public function print(Request $request)
    {
        $validate = $request->validate([
            'data' => 'required',
        ]);

        $sectorsName = Sector::where('id', $request->sector)->first();

        if($request->data == 'Jemaat') {
            if($request->year == 'All' && $request->sector == 'All') {
                $datas = FamilyMember::all();
                $year = '';
                $sector = '';
            } elseif ($request->year == 'All') {
                $datas = FamilyMember::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector);
                }))->get();
                $year = '';
                $sector = $sectorsName->nama;
            } elseif ($request->sector == 'All') {
                $datas = FamilyMember::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('tahun', $request->year);
                }))->get();
                $year = $request->year;
                $sector = '';
            } else {
                $datas = FamilyMember::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector)->where('tahun', $request->year);
                }))->get();
                $year = 'Tahun ' . $request->year;
                $sector = $sectorsName->nama;
            }

            $pdf = PDF::loadView('dashboard.print.print', compact('datas', 'year', 'sector'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        } elseif($request->data == 'Kawin') {
            if($request->year == 'All' && $request->sector == 'All') {
                $datas = Married::all();
                $year = '';
                $sector = '';
            } elseif ($request->year == 'All') {
                $datas = Married::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector);
                }))->get();
                $year = '';
                $sector = $sectorsName->nama;
            } elseif ($request->sector == 'All') {
                $datas = Married::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('tahun', $request->year);
                }))->get();
                $year = $request->year;
                $sector = '';
            } else {
                $datas = Married::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector)->where('tahun', $request->year);
                }))->get();
                $year = 'Tahun ' . $request->year;
                $sector = $sectorsName->nama;
            }

            $pdf = PDF::loadView('dashboard.print.married', compact('datas', 'year', 'sector'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        }  elseif($request->data == 'Sidi') {
            if($request->year == 'All' && $request->sector == 'All') {
                $datas = Sidi::all();
                $year = '';
                $sector = '';
            } elseif ($request->year == 'All') {
                $datas = Sidi::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector);
                }))->get();
                $year = '';
                $sector = $sectorsName->nama;
            } elseif ($request->sector == 'All') {
                $datas = Sidi::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('tahun', $request->year);
                }))->get();
                $year = $request->year;
                $sector = '';
            } else {
                $datas = Sidi::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector)->where('tahun', $request->year);
                }))->get();
                $year = 'Tahun ' . $request->year;
                $sector = $sectorsName->nama;
            }
            
            $pdf = PDF::loadView('dashboard.print.sidi', compact('datas', 'year', 'sector'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        } elseif($request->data == 'Monding') {
            if($request->year == 'All' && $request->sector == 'All') {
                $datas = Monding::all();
                $year = '';
                $sector = '';
            } elseif ($request->year == 'All') {
                $datas = Monding::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector);
                }))->get();
                $year = '';
                $sector = $sectorsName->nama;
            } elseif ($request->sector == 'All') {
                $datas = Monding::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('tahun', $request->year);
                }))->get();
                $year = $request->year;
                $sector = '';
            } else {
                $datas = Monding::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector)->where('tahun', $request->year);
                }))->get();
                $year = 'Tahun ' . $request->year;
                $sector = $sectorsName->nama;
            }

            $pdf = PDF::loadView('dashboard.print.monding', compact('datas', 'year'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        } elseif($request->data == 'Baptis') {
            if($request->year == 'All' && $request->sector == 'All') {
                $datas = Baptism::all();
                $year = '';
                $sector = '';
            } elseif ($request->year == 'All') {
                $datas = Baptism::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector);
                }))->get();
                $year = '';
                $sector = $sectorsName->nama;
            } elseif ($request->sector == 'All') {
                $datas = Baptism::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('tahun', $request->year);
                }))->get();
                $year = $request->year;
                $sector = '';
            } else {
                $datas = Baptism::whereHas('families', (function ($query) {
                    global $request;
                    return $query->where('sector_id', $request->sector)->where('tahun', $request->year);
                }))->get();
                $year = 'Tahun ' . $request->year;
                $sector = $sectorsName->nama;
            }
            $pdf = PDF::loadView('dashboard.print.baptis', compact('datas', 'year', 'sector'))->setPaper('a4', 'landscape');
            return $pdf->stream();
        }
    }
}
