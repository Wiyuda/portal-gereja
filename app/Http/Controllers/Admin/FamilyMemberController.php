<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\goOut;
use App\Models\Sector;
use App\Models\Shift;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    public function index()
    {
        $shifts = Shift::all();
        $shiftId = [];
        foreach($shifts as $shift) {
            array_push($shiftId, $shift->family_member_id);
        }
        $outs = goOut::all();
        $outId = [];
        foreach($outs as $out) {
            array_push($outId, $out->family_member_id);
        }
        $members = FamilyMember::with('families')->where('status', 'Hidup')->whereNotIn('id', $shiftId)->whereNotIn('id', $outId)->orderBy('id', 'desc')->get();
        return view('dashboard.family-member.family', compact('members'));
    }

    public function create()
    {
        $sectors = Sector::all();
        $genders = ['Laki-Laki', 'Perempuan'];
        $familyStatuses = ['Ayah', 'Ibu', 'Anak'];
        $childStatuses = ['Anak Kandung', 'Anak Angkat'];
        $educations = ['Belum Sekolah', 'SD','SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'];
        $statuses = ['Hidup', 'Almarhum'];
        return view('dashboard.family-member.create', compact('genders', 'familyStatuses', 'childStatuses', 'educations', 'statuses', 'sectors'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'sector_id' => 'required|numeric',
            'family_id' => 'required|numeric',
            'nama' => 'required|max:100',
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|max:13',
            'alamat' => 'required',
            'status_keluarga' => 'required',
            'status_anak' => 'nullable',
            'pendidikan' => 'required',
        ]);

        $member = new FamilyMember($validator);
        $member['tahun'] = date('Y');
        $member['status'] = 'Hidup';
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
        $sectors = Sector::all();
        $families = Family::all();
        $genders = ['Laki-Laki', 'Perempuan'];
        $familyStatuses = ['Ayah', 'Ibu', 'Anak'];
        $childStatuses = ['Anak Kandung', 'Anak Angkat'];
        $educations = ['Belum Sekolah', 'SD','SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'];
        $statuses = ['Hidup', 'Almarhum'];
        return view('dashboard.family-member.edit', compact('family', 'families', 'genders', 'familyStatuses', 'childStatuses', 'educations', 'statuses', 'sectors'));
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
            'status_anak' => 'nullable',
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
