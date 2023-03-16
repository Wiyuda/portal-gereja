<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['no_registrasi', 'sector_id', 'keluarga'];

    public function sectors()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class, 'id');
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class, 'id');
    }
}
