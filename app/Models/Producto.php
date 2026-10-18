<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; 

    protected $fillable = ['nombre', 'descripcion', 'precio', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; 

    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}