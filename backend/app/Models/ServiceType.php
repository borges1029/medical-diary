<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;

    // Definindo o relacionamento com Doctor
    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'service_type_id');
    }
}
