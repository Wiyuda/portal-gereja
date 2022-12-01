<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('dashboard.profil.profil', compact('profile'));
    }

    public function edit()
    {
        $profile = Profile::first();
        return view('dashboard.profil.edit', compact('profile'));
    }

    public function update(Request $request, $id) {
        $validate = $request->validate([
            'pendeta_resort' => 'required|max:50',
            'pendeta_jemaat' => 'required|max:50',
            'guru_huria' => 'required|max:50',
            'sintua' => 'required',
        ]);

        Profile::find($id)->update($request->all());

        return redirect()->route('profil.index')->with('status', 'Profile Gereja Berhasil di Update');
    }

    public function show($id)
    {
        $profile = Profile::find($id);
        return view('dashboard.profil.detail', compact('profile'));
    }
}
