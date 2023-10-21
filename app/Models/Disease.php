<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'treatment_id'];
    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}
