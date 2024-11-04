<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurOutput extends Model
{
    use HasFactory;

    protected $table = 'ouroutput';

    protected $fillable = [ 'logo', 'title', 'description'];

}
