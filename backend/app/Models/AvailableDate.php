<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableDate extends Model
{
    use HasFactory;

    // Definindo o relacionamento com Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
