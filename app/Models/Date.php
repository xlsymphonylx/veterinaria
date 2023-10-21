<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'datetime', 'patient_id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
