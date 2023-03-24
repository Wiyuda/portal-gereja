<?php

namespace App\Exports;

use App\Models\FamilyMember;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FamilyMemberExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $start = $this->request->start . " " . "00:00:00";
        $end = $this->request->end . " " . "23:59:59";
        if($this->request->sector == 'All') {
            $datas = DB::table('family_members')
                ->whereBetween('family_members.created_at', [$start, $end])
                ->join('families', 'families.id', '=', 'family_members.family_id')
                ->join('sectors', 'sectors.id', '=', 'family_members.sector_id')
                ->join('baptisms', 'baptisms.family_member_id', '=', 'family_members.id')
                ->select('families.no_registrasi', 'sectors.sektor', 'families.keluarga', 'family_members.nama', 'tgl_lahir', 'tempat_lahir', 'jenis_kelamin', 'no_hp', 'alamat', 'status_keluarga', 'status_anak', 'pendidikan', 'baptisms.baptis', 'baptisms.tanggal', 'baptisms.gereja', )
                ->get();
                // ->join('sidis', 'family_members.id', '=', 'sidis.family_member_id')
                // ->join('mondings', 'family_members.id', '=', 'mondings.family_member_id')
                // ->join('marrieds', 'family_members.id', '=', 'marrieds.family_member_id')
                // ->select('families.no_registrasi', 'sectors.sektor', 'families.keluarga', 'marrieds.tanggal', 'marrieds.gereja', 'families.alamat', 'no_hp',  'family_members.nama', 'jenis_kelamin', 'status_keluarga', 'status_anak', 'tgl_lahir', 'tempat_lahir', 'baptisms.baptis', 'baptisms.tanggal', 'baptisms.gereja', 'sidis.sidi', 'sidis.tanggal', 'sidis.gereja', 'families.status',  'pendidikan', 'mondings.monding', 'mondings.tanggal')
                // ->get();
        } else {
            $datas = DB::table('family_members')
                ->whereBetween('family_members.created_at', [$start, $end])
                ->join('families', 'families.id', '=', 'family_members.family_id')
                ->join('sectors', 'sectors.id', '=', 'family_members.sector_id')
                ->where('sectors.id', '=', $this->request->sector)
                ->select('families.no_registrasi', 'sectors.sektor', 'families.keluarga', 'family_members.nama', 'tgl_lahir', 'tempat_lahir', 'jenis_kelamin', 'no_hp', 'alamat', 'status_keluarga', 'status_anak', 'pendidikan')
                ->get();
        }
        dd($datas);
        return $datas;
    }

    public function headings(): array 
    {
        return [
            'No. Registrasi',
            'WIJK',
            'Keluarga',
            'Tgl Kawin',
            'Gereja Kawin',
            'Alamat',
            'HP',
            'Nama',
            'Jenis Kelamin',
            'Status Keluarga',
            'Status Anak',
            'Tanggal Lahir',
            'Tempat Lahir',
            'Status Baptis',
            'Tgl Baptis',
            'Gereja Baptis',
            'Status Sidi',
            'Tgl Sidi',
            'Gereja Sidi',
            'Janda / Duda',
            'Pendidikan',
            'Status Monding',
            'Tgl Monding'
        ];
    }
}
