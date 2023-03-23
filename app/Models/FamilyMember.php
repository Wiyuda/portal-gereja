<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['family_id', 'nama', 'tgl_lahir', 'tempat_lahir', 'jenis_kelamin', 'no_hp', 'status_keluarga', 'status_anak', 'pendidikan', 'status', 'tahun', 'sector_id'];

    public function families()
    {
        return $this->belongsTo(Family::class, 'family_id');
    }

    public function sidis()
    {
        return $this->hasOne(Sidi::class, 'id');
    }

    public function mondings()
    {
        return $this->hasOne(Monding::class, 'id');
    }

    public function shifts()
    {
        return $this->hasOne(Shift::class, 'id');
    }

    public function goOuts()
    {
        return $this->hasOne(Shift::class, 'id');
    }
}
