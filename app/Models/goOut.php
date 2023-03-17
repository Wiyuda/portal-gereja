<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class goOut extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sector_id', 'family_id', 'family_member_id', 'status', 'tgl', 'keterangan'];

    public function sectors()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    public function families()
    {
        return $this->belongsTo(Family::class, 'family_id');
    }

    public function familyMembers()
    {
        return $this->belongsTo(FamilyMember::class, 'family_member_id');
    }
}
