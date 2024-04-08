<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = ['nro', 'fecha', 'id_procedencia', 'numero_carta_o_prov', 'detalle'];

    // Relación con el modelo Procedencia
    public function procedencia()
    {
        return $this->belongsTo(Procedencia::class);
    }

}
