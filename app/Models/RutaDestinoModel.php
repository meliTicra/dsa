<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RutaDestinoModel extends Model
{
    protected $fillable = ['nombre_destino', 'direccion', 'tipo_destino'];

    public function documentos()
    {
        return $this->belongsToMany(DocumentoModel::class)
                    ->withPivot('fecha_envio')
                    ->withTimestamps();
    }
}