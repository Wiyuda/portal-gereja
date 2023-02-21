<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReadNewsController extends Controller
{
    public function index()
    {
        $titleReports = Report::orderBy('id', 'desc')->limit(5)->get();
        $reports = Report::orderBy('id', 'desc')->get();

        return view('news', compact('titleReports', 'reports'));
    }

    public function show($id)
    {
        $report = Report::find($id);
        $titleReports = Report::orderBy('id', 'desc')->limit(5)->get();
        $reports = Report::orderBy('id', 'desc')->get();

        return view('read', compact('titleReports', 'reports', 'report'));
    }
}
