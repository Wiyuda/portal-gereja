<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShiftRequest;
use App\Http\Requests\ShiftUpdateRequest;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\Sector;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::orderBy('id', 'desc')->get();
        return view('dashboard.shift.index', compact('shifts'));
    }

    public function create()
    {
        $sectors = Sector::all();
        return view('dashboard.shift.create', compact('sectors'));
    }

    public function store(ShiftRequest $shiftRequest)
    {
        $validated = $shiftRequest->validated();
        
        if($validated['family_member_id'] == 'All') {
            $families = FamilyMember::where('family_id', $validated['family_id'])->get();
            foreach($families as $family) {
                $shift = new Shift($validated);
                $shift['family_member_id'] = $family->id;
                $shift->save();
            }
            return redirect()->route('pindah.index')->with('status', 'Data Jemaat Pindah Gereja Berhasil di Tambahkan');
        }

        $shift = Shift::create($validated);
        
        return redirect()->route('pindah.index')->with('status', 'Data Jemaat Pindah Gereja Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $shift = Shift::find($id);
        $sectors = Sector::all();
        $families = Family::where('sector_id', $shift->sector_id)->get();
        $members = FamilyMember::where('family_id', $shift->family_id)->get();
        return view('dashboard.shift.edit', compact('shift', 'sectors', 'families', 'members'));
    }

    public function update(Request $request , $id)
    {   
        $shift = Shift::find($id);

        $validated = $request->validate([
            'sector_id' => 'required|numeric',
            'family_id' => 'required|numeric',
            'family_member_id' => 'required', Rule::unique('shifts')->ignore($shift->id),
            'status' => 'required|string', 
            'tgl' => 'required|date',
            'gereja' => 'required|string',
            'keterangan' => 'required|string',
        ]);
        
        $shift = Shift::find($id)->update($validated);

        return redirect()->route('pindah.index')->with('status', 'Data Jemaat Pindah Gereja Berhasil di Edit');
    }

    public function destroy($id)
    {
        $shift = Shift::find($id)->delete();

        return redirect()->route('pindah.index')->with('status', 'Data Jemaat Pindah Gereja Berhasil di Hapus');
    }
}
