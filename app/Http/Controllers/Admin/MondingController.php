<?php

namespace App\Http\Controllers\Admin;

use App\Models\Family;
use App\Models\Monding;
use App\Models\FamilyMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MondingController extends Controller
{
    public function index()
    {
        $mondings = Monding::with('family_members')->orderBy('id', 'desc')->get();
        return view('dashboard.monding.monding', compact('mondings'));
    }

    public function getFamilyMember($id)
    {
        $familyMember = FamilyMember::where('family_id', $id)->get();
        return response()->json($familyMember);
    }

    public function create()
    {
        $families = Family::all();
        $monding = 'Monding';
        return view('dashboard.monding.create', compact('families', 'monding'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'family_id' => 'required',
            'family_member_id' => 'required|integer',
            'monding' => 'required',
            'tanggal' => 'date',
            'keterangan' => 'required'
        ]);

        $monding = Monding::create($validator);

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
            'tanggal' => 'date',
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
