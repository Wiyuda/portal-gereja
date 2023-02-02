<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monding extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['family_id', 'family_member_id', 'monding', 'tanggal', 'keterangan'];

    public function families()
    {
        return $this->belongsTo(Family::class, 'family_id');
    }

    public function family_members()
    {
        return $this->belongsTo(FamilyMember::class, 'family_member_id');
    }
}
