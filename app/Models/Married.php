<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Married extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['family_id', 'kawin', 'tanggal', 'gereja'];

    public function families()
    {
        return $this->belongsTo(Family::class, 'family_id');
    }
}
