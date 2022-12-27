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

    public function create()
    {
        $statuses = ['baptis', 'belum baptis'];
        $family_members = FamilyMember::all(); 
        $baptisms = Baptism::all();
        return view('dashboard.baptism.create', compact('baptisms', 'statuses', 'family_members'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'family_member_id' => 'required',
            'baptis' => 'required',
            'tanggal' => 'date'
        ]);

        Baptism::create([
            'family_member_id' => $request->family_member_id,
            'baptis' => $request->baptis,
            'tanggal' => $request->tanggal,
            'gereja' => $request->gereja
        ]);
        
        return redirect()->route('baptis.index')->with('status', 'Data Baptis Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $statuses = ['baptis', 'belum baptis'];
        $family_members = FamilyMember::all();
        $baptism = Baptism::find($id);
        
        return view('dashboard.baptism.edit', compact('baptism', 'statuses', 'family_members'));        
    }

    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'family_member_id' => 'required',
            'baptis' => 'required',
            'tanggal' => 'date'
        ]);
      
        Baptism::find($id)->update([
            'family_member_id' => $request->family_member_id,
            'baptis' => $request->baptis,
            'tanggal' => $request->tanggal,
            'gereja' => $request->gereja
        ]);

        return redirect()->route('baptis.index')->with('status', 'Data Baptis Berhasil di Update');
    }

    public function destroy($id)
    {
        Baptism::find($id)->delete();
        return redirect()->route('baptis.index')->with('status', 'Data Baptis Berhasil di Hapus');
    }
}
