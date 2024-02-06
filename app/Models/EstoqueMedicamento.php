<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueMedicamento extends Model
{
    use HasFactory;

    protected $table = "medicamentos_estoque";

    public function getMedicamentoName()
    {
        return $this->belongsTo(Medicamento::class, 'medicamento_id');
    }
}
