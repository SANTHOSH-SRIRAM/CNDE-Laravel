<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professors extends Model
{
    use HasFactory;

    protected $table = 'professors';

    protected $fillable = [
        'name',
        'photo',
        'designation',
        'additional_designation', // This will be stored as JSON
        'mail_id',
        'linkedin',
        'google_scholar',
    ];

    // Cast additional_designation to an array
    protected $casts = [
        'additional_designation' => 'array', // Cast JSON to array
    ];

    /**
     * Accessor for additional designations
     *
     * @return array
     */
    public function getAdditionalDesignationAttribute($value)
    {
        return json_decode($value, true); // Decode JSON string to an array
    }

    /**
     * Mutator for additional designations
     *
     * @param mixed $value
     */
    public function setAdditionalDesignationAttribute($value)
    {
        $this->attributes['additional_designation'] = json_encode($value); // Encode array to JSON string
    }

}
