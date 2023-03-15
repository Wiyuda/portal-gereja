<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgrammerController extends Controller
{
    public function index()
    {
        return view('developer');
    }
}
