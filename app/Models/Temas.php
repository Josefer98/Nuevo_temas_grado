<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temas extends Model
{
    use HasFactory;
    protected $fillable=[
     'id_tema',
     'titulo',
     'area',
     'palabras_clave',
     'estado',
     'descripcion'
    ];
}
