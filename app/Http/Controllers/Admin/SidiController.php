<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sidi;
use App\Models\Family;
use App\Models\FamilyMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SidiController extends Controller
{
    public function index()
    {
        $sidis = Sidi::with('family_members')->orderBy('id', 'desc')->get();
        return view('dashboard.sidi.sidi', compact('sidis'));
    }

    public function getFamilyMember($id)
    {
        $familyMember = FamilyMember::where('family_id', $id)->get();
        return response()->json($familyMember);
    }

    public function create()
    {
        $families = Family::all();
        $sidi = 'Sidi';
        return view('dashboard.sidi.create', compact('families', 'sidi'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'family_id' => 'required',
            'family_member_id' => 'required|integer',
            'sidi' => 'required',
            'tanggal' => 'date|required',
            'gereja' => 'required',
            'keterangan' => 'required'
        ]);
        
        $sidi = new Sidi($validator);
        $sidi['tahun'] = date('Y');
        $sidi->save();
        return redirect()->route('sidi.index')->with('status', 'Data Sidi Jemaat Berhasil di Tambahkan');
    }

    public function show($id)
    {
        $sidi = Sidi::find($id);
        return view('dashboard.sidi.detail', compact('sidi'));
    }

    public function edit($id)
    {
        $sidi = Sidi::find($id);
        $families = Family::all();
        $family_members = FamilyMember::where('family_id', $sidi->family_id)->get();
        $sidiStatus = 'Sidi';
        return view('dashboard.sidi.edit', compact('sidi', 'families', 'family_members', 'sidiStatus'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'family_id' => 'required',
            'family_member_id' => 'required|integer',
            'sidi' => 'required',
            'tanggal' => 'date|required',
            'gereja' => 'required',
            'keterangan' => 'required'
        ]);
        
        Sidi::find($id)->update($validator);
        return redirect()->route('sidi.index')->with('status', 'Data Sidi Jemaat Berhasil di Update');
    }

    public function destroy($id)
    {
        Sidi::find($id)->delete();
        return redirect()->route('sidi.index')->with('status', 'Data Sidi Jemaat Berhasil di Hapus');
    }
}
