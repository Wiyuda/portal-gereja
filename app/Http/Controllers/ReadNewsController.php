<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadNewsController extends Controller
{
    public function index()
    {
        return view('news');
    }

    public function show()
    {
        return view('read');
    }
}
