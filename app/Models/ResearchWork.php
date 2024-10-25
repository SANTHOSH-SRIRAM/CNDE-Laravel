<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchWork extends Model
{
    use HasFactory;

    protected $table = 'researchwork';

    protected $fillable = [
        'name',
        'image',

    ];
}
