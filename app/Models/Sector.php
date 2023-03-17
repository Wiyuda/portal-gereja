<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sektor', 'nama', 'keterangan'];

    public function families()
    {
        return $this->hasMany(Family::class, 'id');
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class, 'id');
    }

    public function goOuts()
    {
        return $this->hasMany(Shift::class, 'id');
    }
}
