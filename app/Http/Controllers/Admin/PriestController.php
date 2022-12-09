<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Priest;
use Illuminate\Http\Request;

class PriestController extends Controller
{
    public function index()
    {
        $priests = Priest::orderBy('id', 'desc')->get();
        return view('dashboard.priest.priest', compact('priests'));
    }

    public function create()
    {
        return view('dashboard.priest.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date',
            'keterangan' => 'required',
        ]);

        $priest = Priest::create($validate);

        return redirect()->route('pastur.index')->with('status', 'Data Pastur Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $priest = Priest::find($id);
        return view('dashboard.priest.edit', compact('priest'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date',
            'keterangan' => 'required',
        ]);

        $priest = Priest::find($id)->update($validate);

        return redirect()->route('pastur.index')->with('status', 'Data Pastur Berhasil di Update');
    }

    public function destroy($id)
    {
        Priest::find($id)->delete();
        return redirect()->route('pastur.index')->with('status', 'Data Pastur Berhasil di Hapus');
    }
}
