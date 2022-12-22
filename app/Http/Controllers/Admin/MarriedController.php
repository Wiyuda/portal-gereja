<?php

namespace App\Http\Controllers\Admin;

use App\Models\Family;
use App\Models\Sector;
use App\Models\Married;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarriedController extends Controller
{
    public function index()
    {
        $marrieds = Married::with('families')->orderBy('id', 'desc')->get();
        return view('dashboard.married.married', compact('marrieds'));
    }

    public function create()
    {
        $sectors = Sector::all();
        $families = Family::all();
        return view('dashboard.married.create', compact('families', 'sectors'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'family_id' => 'required',
            'kawin' => 'required',
            'tanggal' => 'required|date',
            'gereja' => 'required',
        ]);

        $married = Married::create($validate);
        return redirect()->route('kawin.index')->with('status', 'Data Kawin Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $sectors = Sector::all();
        $families = Family::all();
        $married = Married::find($id);
        
        return view('dashboard.married.edit', compact('sectors', 'married', 'families'));
    }

    public function update(Request $request, $id)
    {
        // $validate = $request->validate([
        //     'family_id' => 'required',
        //     'kawin' => 'required',
        //     'tanggal' => 'required|date',
        //     'gereja' => 'required',
        // ]);

        // $married = Married::find($id)->update($validate);
        
        $data = Married::find($id);
        $data->update($request->all());
        // dd($data);

        return redirect()->route('kawin.index')->with('status', 'Data Kawin Berhasil di Update');
    }

    public function destroy($id)
    {
        Married::find($id)->delete();
        return redirect()->route('kawin.index')->with('status', 'Data Kawin Berhasil di Hapus');
    }
}
