<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Método para definir las reglas de validación
    public static function validationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500', // Ajusta según lo necesites
        ];
    }

    // RELACION DE UNO A MUCHOS
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
