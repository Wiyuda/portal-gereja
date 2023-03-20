<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Married extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['family_id', 'family_member_id', 'kawin', 'nama_calon', 'asal_gereja_calon', 'tanggal', 'gereja', 'keterangan', 'tahun', 'sector_id'];

    public function families()
    {
        return $this->belongsTo(Family::class, 'family_id');
    }

    public function family_members()
    {
        return $this->belongsTo(FamilyMember::class, 'family_member_id');
    }
}
