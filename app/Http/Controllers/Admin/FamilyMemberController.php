<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    public function index()
    {
        $members = FamilyMember::with('families')->orderBy('id', 'desc')->get();
        return view('dashboard.family-member.family', compact('members'));
    }

    public function create()
    {
        $families = Family::all();
        $genders = ['Laki-Laki', 'Perempuan'];
        $familyStatuses = ['Ayah', 'Ibu', 'Anak'];
        $childStatuses = ['Menikah', 'Orangtua'];
        $educations = ['SD','SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'];
        $statuses = ['Janda', 'Duda'];
        return view('dashboard.family-member.create', compact('families', 'genders', 'familyStatuses', 'childStatuses', 'educations', 'statuses'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'family_id' => 'required',
            'nama' => 'required|max:100',
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|max:13',
            'alamat' => 'required',
            'status_keluarga' => 'required',
            'pendidikan' => 'required',
        ]);

        $member = new FamilyMember($validator);
        $member['tahun'] = date('Y');
        $member->save();

        return redirect()->route('member.index')->with('status', 'Data Anggota Keluarga Berhasil di Tambahkan');
    }

    public function show($id)
    {
        $family = FamilyMember::find($id);
        return view('dashboard.family-member.detail', compact('family'));
    }

    public function edit($id)
    {
        $family = FamilyMember::find($id);
        $families = Family::all();
        $genders = ['Laki-Laki', 'Perempuan'];
        $familyStatuses = ['Ayah', 'Ibu', 'Anak'];
        $childStatuses = ['Menikah', 'Orangtua'];
        $educations = ['SD','SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'];
        $statuses = ['Janda', 'Duda'];
        return view('dashboard.family-member.edit', compact('family', 'families', 'genders', 'familyStatuses', 'childStatuses', 'educations', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'family_id' => 'required',
            'nama' => 'required|max:100',
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|max:13',
            'alamat' => 'required',
            'status_keluarga' => 'required',
            'pendidikan' => 'required',
        ]);

        $member = FamilyMember::find($id)->update($validator);

        return redirect()->route('member.index')->with('status', 'Data Anggota Keluarga Berhasil di Update');
    }

    public function destroy($id)
    {
        FamilyMember::find($id)->delete();
        return redirect()->route('member.index')->with('status', 'Data Anggota Keluarga Berhasil di Hapus');
    }
}
