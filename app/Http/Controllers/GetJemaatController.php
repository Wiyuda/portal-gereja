<?php

namespace App\Http\Controllers;

use App\Models\FamilyMember;
use App\Models\goOut;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetJemaatController extends Controller
{
    public function show($id)
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
        $families = FamilyMember::with('families')->where('family_id', $id)->where('status', 'Hidup')->whereNotIn('id', $shiftId)->whereNotIn('id', $outId)->orderBy('id', 'desc')->get();

        return view('jemaat', compact('families'));
    }
}
