<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::orderBy('id', 'desc')->get();
        return view('dashboard.sector.sector', compact('sectors'));
    }

    public function create()
    {
        return view('dashboard.sector.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'sektor' => 'required|unique:sectors,sektor|uppercase',
            'nama' => 'required',
            'keterangan' => 'required'
        ]);

        $sector = Sector::create($validate);

        return redirect()->route('sektor.index')->with('status', 'Data Sektor Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $sector = Sector::find($id);
        return view('dashboard.sector.edit', compact('sector'));
    }

    public function update(Request $request, $id)
    {
        $sector = Sector::find($id);
        $validate = $request->validate([
            'sektor' => 'required|uppercase', Rule::unique('sectors')->ignore($sector->id),
            'nama' => 'required',
            'keterangan' => 'required'
        ]);

        $sector->update($validate);

        return redirect()->route('sektor.index')->with('status', 'Data Sektor Berhasil di Update');
    }

    public function destroy($id)
    {
        Sector::find($id)->delete();
        return redirect()->route('sektor.index')->with('status', 'Data Sektor Berhasil di Hapus');   
    }
}
