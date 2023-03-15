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

        $family_member = FamilyMember::where('status', 'Hidup')->get()->count();
        $family = Family::all()->count();
        $families = FamilyMember::where('status', 'hidup')->orderBy('id', 'desc')->get();
        $profile = Profile::first();
        $sintuas = explode(',',$profile->sintua);
        $news = News::all();
        $sintua = count($sintuas);
        $banner = Banner::first();
        $reports = Report::orderBy('id', 'desc')->limit(3)->get();
        $titleReports = Report::orderBy('id', 'desc')->limit(5)->get();

        return view('home', compact('family_member', 'families', 'family', 'profile', 'news', 'sintua', 'banner', 'sintuas', 'reports', 'titleReports'));
    }
}
