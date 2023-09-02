<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FamilyMemberExport;
use App\Models\Sector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'sector' => 'required'
        ]);

        return Excel::download(new FamilyMemberExport($request), 'jemaat-gereja.xlsx');
    }
}