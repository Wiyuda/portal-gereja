<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use App\Models\Sidi;
use Illuminate\Http\Request;

class SidiController extends Controller
{
    public function index()
    {
        $sidis = Sidi::with('family_members')->orderBy('id', 'desc')->get();
        return view('dashboard.sidi.sidi', compact('sidis'));
    }

    public function create()
    {
        $familyMembers = FamilyMember::all();
        $sidis = ['Sidi', 'Belum Sidi'];
        return view('dashboard.sidi.create', compact('familyMembers', 'sidis'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'family_member_id' => 'required|integer',
            'sidi' => 'required',
            'tgl' => 'date'
        ]);
        $sidi = Sidi::create([
            'family_member_id' => $request->family_member_id,
            'sidi' => $request->sidi,
            'tgl' => $request->tgl,
            'gereja' => $request->gereja
        ]);
        $sidi->save();

        return redirect()->route('sidi.index')->with('Data Sidi Jemaat Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $sidi = Sidi::find($id);
        $familyMembers = FamilyMember::all();
        $sidis = ['Sidi', 'Belum Sidi'];
        return view('dashboard.sidi.edit', compact('familyMembers', 'sidis', 'sidi'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'family_member_id' => 'required|integer',
            'sidi' => 'required',
            'tgl' => 'date'
        ]);
        $sidi = Sidi::find($id)->update([
            'sidi' => $request->sidi,
            'tgl' => $request->tgl,
            'gereja' => $request->gereja
        ]);

        return redirect()->route('sidi.index')->with('Data Sidi Jemaat Berhasil di Update');
    }

    public function destroy($id)
    {
        Sidi::find($id)->delete();
        return redirect()->route('sidi.index')->with('Data Sidi Jemaat Berhasil di Hapus');
    }
}
