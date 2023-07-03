<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'poster',
        'image',
        'deadline',
        'title',
        'about_job',
        'status',
        'salary',
    ];
}
