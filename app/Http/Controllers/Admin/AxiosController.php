<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\FamilyMember;
use Illuminate\Http\Request;

class AxiosController extends Controller
{
    public function family(Request $request)
    {
        $families = Family::where('id', $request->get('id'))->pluck('keluarga', 'id');
        return response()->json($families);
    }
    public function familyMember(Request $request)
    {
        $members = FamilyMember::where('family_id', $request->get('id'))->pluck('nama', 'id');
        return response()->json($members);
    }
}
