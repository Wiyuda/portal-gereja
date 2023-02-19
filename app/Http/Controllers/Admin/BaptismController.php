<?php

namespace App\Http\Controllers\Admin;

use App\Models\Baptism;
use App\Models\Family;
use App\Models\FamilyMember;
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
        $familyMember = FamilyMember::where('family_id', $id)->get();
        return response()->json($familyMember);
    }

    public function create()
    {
        $status = 'Baptis';
        $families = Family::all();
        return view('dashboard.baptism.create', compact('status', 'families'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'family_id' => 'required',
            'family_member_id' => 'required',
            'baptis' => 'required',
            'tanggal' => 'date|required',
            'gereja' => 'required',
            'keterangan' => 'required'
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
        $families = Family::all();
        $family_members = FamilyMember::where('family_id', $baptism->family_id)->get();
        return view('dashboard.baptism.edit', compact('baptism', 'status', 'families', 'family_members'));        
    }

    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'family_id' => 'required',
            'family_member_id' => 'required',
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
