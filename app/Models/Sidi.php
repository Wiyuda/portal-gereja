<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sidi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['family_member_id', 'sidi', 'tgl', 'gereja'];

    public function family_members()
    {
        return $this->belongsTo(FamilyMember::class, 'family_member_id');
    }
}
