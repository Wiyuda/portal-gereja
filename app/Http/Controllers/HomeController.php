<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\goOut;
use App\Models\News;
use App\Models\Family;
use App\Models\Profile;
use App\Models\FamilyMember;
use App\Models\Report;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }

        $shifts = Shift::all();
        $shiftId = [];
        foreach($shifts as $shift) {
            array_push($shiftId, $shift->family_member_id);
        }
        $outs = goOut::all();
        $outId = [];
        foreach($outs as $out) {
            array_push($outId, $out->family_member_id);
        }
        $family_member = FamilyMember::with('families')->where('status', 'Hidup')->whereNotIn('id', $shiftId)->whereNotIn('id', $outId)->orderBy('id', 'desc')->get()->count();
        $family = Family::all()->count();
        $families = FamilyMember::with('families')->where('status', 'Hidup')->whereNotIn('id', $shiftId)->whereNotIn('id', $outId)->orderBy('id', 'desc')->get();
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
