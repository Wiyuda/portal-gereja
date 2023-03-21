<?php

namespace App\Http\Controllers\Admin;

use App\Models\Baptism;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\goOut;
use App\Models\Sector;
use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaptismController extends Controller
{
    public function index()
    {
        $baptisms = Baptism::with('family_members')->orderBy('id', 'desc')->get();
        return view('dashboard.baptism.baptism', compact('baptisms'));
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
        $status = 'Baptis';
        $sectors = Sector::all();
        return view('dashboard.baptism.create', compact('status', 'sectors'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'sector_id' => 'required|numeric',
            'family_id' => 'required|numeric',
            'family_member_id' => 'required|numeric',
            'baptis' => 'required',
            'tanggal' => 'date|required',
            'gereja' => 'required',
            'keterangan' => 'nullable'
        ]);

        $baptis = new Baptism($validate);
        $baptis['tahun'] = date('Y');
        $baptis->save(); 
        return redirect()->route('baptis.index')->with('status', 'Data Baptis Berhasil di Tambahkan');
    }

    public function show($id)
    {
        $baptism = Baptism::find($id);
        return view('dashboard.baptism.detail', compact('baptism'));
    }

    public function edit($id)
    {
        $baptism = Baptism::find($id);
        $status = 'Baptis';
        $sectors = Sector::all();
        $families = Family::all();
        $family_members = FamilyMember::where('family_id', $baptism->family_id)->get();
        return view('dashboard.baptism.edit', compact('baptism', 'status', 'families', 'family_members', 'sectors'));        
    }

    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'sector_id' => 'required|numeric',
            'family_id' => 'required|numeric',
            'family_member_id' => 'required|numeric',
            'baptis' => 'required',
            'tanggal' => 'date|required',
            'gereja' => 'required',
            'keterangan' => 'required'
        ]);

        Baptism::find($id)->update($validate);
        return redirect()->route('baptis.index')->with('status', 'Data Baptis Berhasil di Update');
    }

    public function destroy($id)
    {
        Baptism::find($id)->delete();
        return redirect()->route('baptis.index')->with('status', 'Data Baptis Berhasil di Hapus');
    }
}
