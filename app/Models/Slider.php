<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = ['gambar','deskripsi','caption'];
    protected $table = 'sliders';
    protected $primaryKey = 'id';
}