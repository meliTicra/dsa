<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedencia extends Model
{
    use HasFactory;
    // Modelo Procedencia
    public function documento(){
        return $this->hasMany(Documento::class);
    }
}