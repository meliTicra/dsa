<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoModel extends Model
{
    protected $table = 'documentos'; // Nombre real de la tabla en la base de datos
    protected $fillable = ['nro', 'fecha', 'id_procedencia', 'numero_carta_o_prov', 'detalle'];

    public function procedencia()
    {
        return $this->belongsTo(ProcedenciaModel::class, 'id_procedencia');
    }
}
