<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;
use App\Models\Proveedor;

class Producto extends Model
{
    use HasFactory;

    protected $table="productos";

    public function marca(){
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
