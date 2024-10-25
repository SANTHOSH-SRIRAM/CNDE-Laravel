<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patents extends Model
{
    use HasFactory;

    protected $table = 'patents';

    // Mass-assignable attributes
    protected $fillable = [
        'title',
        'inventors',
        'priority_Date',
        'country',
        'reference',
    ];
}
