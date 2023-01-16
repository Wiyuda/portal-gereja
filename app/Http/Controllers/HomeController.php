<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Family;
use App\Models\Profile;
use App\Models\FamilyMember;
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
        $news = News::all();
        $sintua = Profile::all()->count();

        return view('home', compact('family_member', 'family', 'profile', 'news', 'sintua'));
    }
}
