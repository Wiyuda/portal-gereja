<?php

namespace App\Http\Controllers\Admin;

use App\Models\Family;
use App\Models\goOut;
use App\Models\Monding;
use App\Models\FamilyMember;
use App\Models\Sector;
use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MondingController extends Controller
{
    public function index()
    {
        $mondings = Monding::whereHas('family_members', (function ($query) {
            return $query->where('status', 'Almarhum');
        }))->get();
        return view('dashboard.monding.monding', compact('mondings'));
    }

    public function getFamilyMember($id)
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
        $familyMember = FamilyMember::with('families')->where('family_id', $id)->where('status', 'Hidup')->whereNotIn('id', $shiftId)->whereNotIn('id', $outId)->get();
        return response()->json($familyMember);
    }

    public function create()
    {
        $monding = 'Monding';
        $sectors = Sector::all();
        return view('dashboard.monding.create', compact('sectors', 'monding'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'sector_id' => 'required|numeric',
            'family_id' => 'required|numeric',
            'family_member_id' => 'required|numeric',
            'monding' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required'
        ]);

        $family = FamilyMember::where('id', $validator['family_member_id'])->first();
        $monding = new Monding($validator);
        $monding['tahun'] = date('Y');
        $monding->save();
        $family['status'] = 'Almarhum';
        $family->save();

        return redirect()->route('monding.index')->with('status', 'Data Jemaat Monding Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $monding = Monding::find($id);
        $mondingStatus = 'Monding';
        $families = Family::all();
        $family_members = FamilyMember::where('family_id', $monding->family_id)->get();
        return view('dashboard.monding.edit', compact('monding', 'mondingStatus', 'families',  'family_members'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'family_id' => 'required',
            'family_member_id' => 'required|integer',
            'monding' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required'
        ]);

        $monding = Monding::find($id)->update($validator);

        return redirect()->route('monding.index')->with('status', 'Data Jemaat Monding Berhasil di Update');
    }

    public function destroy($id)
    {
        Monding::find($id)->delete();
        return redirect()->route('monding.index')->with('status', 'Data Jemaat Monding Berhasil di Hapus');
    }
}
