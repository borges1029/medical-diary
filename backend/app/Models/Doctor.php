<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    // Definindo os campos que podem ser preenchidos via atribuição em massa
    protected $fillable = ['name', 'service_type_id'];

    // Definindo o relacionamento com ServiceType
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

    // Definindo o relacionamento com AvailableDate
    public function availableDates()
    {
        return $this->hasMany(AvailableDate::class);
    }
}
