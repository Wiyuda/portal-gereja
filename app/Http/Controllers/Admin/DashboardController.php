<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\News;
use App\Models\Priest;
use App\Models\Sector;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $family = Family::all()->count();
        $friest = Priest::all()->count();
        $news = News::all()->count();
        $sector = Sector::all()->count();
        return view('dashboard.dashboard', compact('family', 'friest', 'news', 'sector'));
    }
}
