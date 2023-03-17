<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OutRequest;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\goOut;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GoOutController extends Controller
{
    public function index()
    {
        $outs = goOut::orderBy('id', 'desc')->get();
        return view('dashboard.out.index', compact('outs'));
    }

    public function create()
    {
        $sectors = Sector::all();
        $statuses = ['Keluar', 'Dikeluarkan'];
        return view('dashboard.out.create', compact('sectors', 'statuses'));
    }

    public function store(OutRequest $outRequest)
    {
        $validated = $outRequest->validated();
        
        if($validated['family_member_id'] == 'All') {
            $families = FamilyMember::where('family_id', $validated['family_id'])->get();
            foreach($families as $family) {
                $out = new goOut($validated);
                $out['family_member_id'] = $family->id;
                $out->save();
            }
            return redirect()->route('keluar.index')->with('status', 'Data Jemaat Keluar Dari Gereja Berhasil di Tambahkan');
        }

        $shift = goOut::create($validated);
        
        return redirect()->route('keluar.index')->with('status', 'Data Jemaat Keluar Dari Gereja Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $out = goOut::find($id);
        $sectors = Sector::all();
        $statuses = ['Keluar', 'Dikeluarkan'];
        $families = Family::where('sector_id', $out->sector_id)->get();
        $members = FamilyMember::where('family_id', $out->family_id)->get();
        return view('dashboard.out.edit', compact('sectors', 'statuses', 'families', 'members', 'out'));
    }

    public function update(Request $request, $id)
    {
        $out = goOut::find($id);

        $validated = $request->validate([
            'sector_id' => 'required|numeric',
            'family_id' => 'required|numeric',
            'family_member_id' => 'required', Rule::unique('go_outs')->ignore($out->id),
            'status' => 'required|string|in:Keluar,Dikeluarkan', 
            'tgl' => 'required|date',
            'keterangan' => 'required|string',
        ]);
        
        $out = goOut::find($id)->update($validated);

        return redirect()->route('keluar.index')->with('status', 'Data Jemaat Keluar Dari Gereja Berhasil di Edit');
    }

    public function destroy($id)
    {
        $shift = goOut::find($id)->delete();

        return redirect()->route('keluar.index')->with('status', 'Data Jemaat Keluar Dari Gereja Berhasil di Hapus');
    }
}
