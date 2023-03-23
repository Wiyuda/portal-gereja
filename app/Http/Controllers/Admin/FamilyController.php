<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\Sector;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index()
    {
        $families = Family::with('sectors')->orderBy('id', 'desc')->get();
        return view('dashboard.family.family', compact('families'));
    }

    public function create()
    {
        $sectors = Sector::all();
        $data = Family::latest('no_registrasi')->first();
        $statuses = ['Berkeluarga', 'Janda', 'Duda'];
        if(!$data) {
            $noRegister = "G0001";
        } else {
            $oldRegister = intval(substr($data->no_registrasi, 4, 4));
            $noRegister = 'G' . sprintf("%04s", ++$oldRegister);
        }
        return view('dashboard.family.create', compact('sectors', 'noRegister', 'statuses'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'no_registrasi' => 'required',
            'sector_id' => 'required|numeric',
            'keluarga' => 'required|max:50',
            'status' => 'required|string|in:Berkeluarga,Janda,Duda',
            'alamat' => 'required|string',
        ]);

        $family = Family::create($validator);

        return redirect()->route('keluarga.index')->with('status', 'Data Keluarga Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $sectors = Sector::all();
        $family = Family::find($id);
        $statuses = ['Berkeluarga', 'Janda', 'Duda'];
        
        return view('dashboard.family.edit', compact('sectors', 'family', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'no_registrasi' => 'required',
            'sector_id' => 'required|numeric',
            'keluarga' => 'required|max:50',
            'status' => 'required|string|in:Berkeluarga,Janda,Duda', 
            'alamat' => 'required|string',
        ]);

        $family = Family::find($id)->update($validator);

        return redirect()->route('keluarga.index')->with('status', 'Data Keluarga Berhasil di Update');
    }

    public function destroy($id)
    {
        Family::find($id)->delete();
        return redirect()->route('keluarga.index')->with('status', 'Data Keluarga Berhasil di Hapus');
    }
}
