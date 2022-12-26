<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use App\Models\Monding;
use Illuminate\Http\Request;

class MondingController extends Controller
{
    public function index()
    {
        $mondings = Monding::with('family_members')->orderBy('id', 'desc')->get();
        return view('dashboard.monding.monding', compact('mondings'));
    }

    public function create()
    {
        $familyMembers = FamilyMember::all();
        $mondings = ['Monding', 'Belum Monding'];
        return view('dashboard.monding.create', compact('familyMembers', 'mondings'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'family_member_id' => 'required|integer',
            'monding' => 'required',
            'tgl' => 'date'
        ]);

        $monding = Monding::create($validator);

        return redirect()->route('monding.index')->with('status', 'Data Jemaat Monding Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $monding = Monding::find($id);
        $familyMembers = FamilyMember::all();
        $mondings = ['Monding', 'Belum Monding'];
        return view('dashboard.monding.edit', compact('familyMembers', 'mondings', 'monding'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'family_member_id' => 'required|integer',
            'monding' => 'required',
            'tgl' => 'date'
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
