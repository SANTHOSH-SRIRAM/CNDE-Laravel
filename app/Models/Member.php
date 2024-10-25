<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'email',
        'photo',
        'startup_id', // Assuming you have a foreign key for linking to Startups
    ];

    public function startup()
    {
        return $this->belongsTo(Startups::class);
    }
}
