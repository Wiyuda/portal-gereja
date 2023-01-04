<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['image_1', 'title_1', 'deskripsi_1', 'image_2', 'title_2', 'deskripsi_2', 'image_3', 'title_3', 'deskripsi_3', 'status'];
}
