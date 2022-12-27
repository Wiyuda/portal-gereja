<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Baptism extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['family_member_id', 'baptis', 'tanggal', 'gereja'];

    public function family_members()
    {
        return $this->belongsTo(FamilyMember::class, 'family_member_id');
   
    }
}
