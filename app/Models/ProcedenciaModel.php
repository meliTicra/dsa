<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcedenciaModel extends Model
{
    protected $table = 'procedencia'; // Nombre real de la tabla en la base de datos
    protected $fillable = ['nombre_procedencia'];

    public function documentos()
    {
        return $this->hasMany(DocumentoModel::class, 'id_procedencia');
    }
}
