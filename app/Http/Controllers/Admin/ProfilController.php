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
            'image' => 'image|file|max:2048|mimes:jpg,jpeg,png|required'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $image = 'profile' . '-' .rand(). '.'. $extension;
        $path = $request->file('image')->storeAs('profile', $image, 'public');

        Profile::find($id)->update([
            'pendeta_resort' => $request->pendeta_resort,
            'pendeta_jemaat' => $request->pendeta_jemaat,
            'guru_huria' => $request->guru_huria,
            'sintua' => $request->sintua,
            'image' => $image
        ]);

        return redirect()->route('profil.index')->with('status', 'Profile Gereja Berhasil di Update');
    }

    public function show($id)
    {
        $profile = Profile::find($id);
        return view('dashboard.profil.detail', compact('profile'));
    }
}
