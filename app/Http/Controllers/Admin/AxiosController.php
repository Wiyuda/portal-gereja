<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\goOut;
use App\Models\Shift;
use Illuminate\Http\Request;

class AxiosController extends Controller
{
    public function family(Request $request)
    {
        $families = Family::where('sector_id', $request->get('id'))->pluck('keluarga', 'id');
        return response()->json($families);
    }
    public function familyMember(Request $request)
    {
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
        $members = FamilyMember::with('families')->where('family_id', $request->get('id'))->where('status', 'Hidup')->whereNotIn('id', $shiftId)->whereNotIn('id', $outId)->pluck('nama', 'id');
        return response()->json($members);
    }
}
