<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable =['name','stock','description','price','merm','supplier_id','category_id']; //SE PODRÁ INSERTAR CUALQUIER DATO SIN NECESIDAD DE UN TOKEN
    

    public static function validationRules(){
        return[
            'name' => 'string|max:50',
            'stock'=> 'required',
            'description'=>'string|max:500',
            'price'=> 'required',
            'merm'=> 'required',
            'supplier_id'=> 'required',
            'category_id'=> 'required',
        ];

    }
    //RELACION UNO A MUCHOS INVERSA
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //RELACION UNO A MUCHOS INVERSA
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    //RELACION DE MUCHOS A MUCHOS
    public function tickets (){
        return $this->belongsToMany(Ticket::class);//MUCHOS A MUCHOS
    }
    public function branches (){
        return $this->belongsToMany(Branch::class);//MUCHOS A MUCHOS
    }
}
