<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\News;
use App\Models\Family;
use App\Models\Profile;
use App\Models\FamilyMember;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }

        $family_member = FamilyMember::all()->count();
        $family = Family::all()->count();
        $profile = Profile::first();
        $sintuas = explode(',',$profile->sintua);
        $news = News::all();
        $sintua = Profile::all()->count();
        $banner = Banner::first();
        $reports = Report::orderBy('id', 'desc')->limit(3)->get();
        $titleReports = Report::orderBy('id', 'desc')->limit(5)->get();

        return view('home', compact('family_member', 'family', 'profile', 'news', 'sintua', 'banner', 'sintuas', 'reports', 'titleReports'));
    }
}
