<?php

namespace App\Http\Controllers\Admin;

use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\goOut;
use App\Models\Sector;
use App\Models\Married;
use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarriedController extends Controller
{
    public function index()
    {
        $marrieds = Married::with('families')->orderBy('id', 'desc')->get();
        return view('dashboard.married.married', compact('marrieds'));
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
        $status = 'Kawin';
        $sectors = Sector::all();
        return view('dashboard.married.create', compact('status', 'sectors'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'sector_id' => 'required|numeric',
            'family_id' => 'required|numeric',
            'family_member_id' => 'required|numeric', 
            'kawin' => 'required',
            'nama_calon' => 'required',
            'asal_gereja_calon' => 'required',
            'tanggal' => 'required|date',
            'gereja' => 'required',
            'keterangan' => 'required'
        ]);

        $married = new Married($validate);
        $married['tahun'] = date('Y');
        $married->save();
        return redirect()->route('kawin')->with('status', 'Data Kawin Berhasil di Tambahkan');
    }

    public function show($id)
    {
        $married = Married::find($id);
        return view('dashboard.married.detail', compact('married'));
    }

    public function edit($id)
    {
        $married = Married::find($id);
        $status = 'Kawin';
        $families = Family::all();
        $sectors = Sector::all();
        $family_members = FamilyMember::where('family_id', $married->family_id)->get();
        return view('dashboard.married.edit', compact('married', 'families', 'status', 'family_members', 'sectors'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'family_id' => 'required',
            'family_member_id' => 'required', 
            'kawin' => 'required',
            'nama_calon' => 'required',
            'asal_gereja_calon' => 'required',
            'tanggal' => 'required|date',
            'gereja' => 'required',
            'keterangan' => 'required'
        ]);

        $married = Married::find($id)->update($validate);

        return redirect()->route('kawin')->with('status', 'Data Kawin Berhasil di Update');
    }

    public function destroy($id)
    {
        Married::find($id)->delete();
        return redirect()->route('kawin')->with('status', 'Data Kawin Berhasil di Hapus');
    }
}
