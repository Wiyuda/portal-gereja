<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view('dashboard.admin.admin', compact('admins'));
    }

    public function create()
    {
        return view('dashboard.admin.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('admin.index')->with('status', 'Data Admin Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $admin = User::find($id);
        return view('dashboard.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'username' => 'required',
        ]);

        $data = User::find($id);
        if(!$request->password) {
            $password = $data->password;
        } else {
            $password = $request->password;
        }

        $data->update([
            'username' => $request->username,
            'password' => bcrypt($password),
        ]);

        return redirect()->route('admin.index')->with('status', 'Data Admin Berhasil di Edit');

    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.index')->with('status', 'Data Admin Berhasil di Hapus');
    }
}
