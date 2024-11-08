<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;
    protected $fillable =['rfc','name','phone','email','manager_name','address']; //SE PODRÁ INSERTAR CUALQUIER DATO SIN NECESIDAD DE UN TOKEN

    public static function validationRules(){
        return[
            'rfc'=>'required|string|max:50',
            'name'=>'string|max:50',
            'phone'=>'string|max:20',
            'email'=>'string|max:50',
            'manager_name'=>'string|max:50',
            'address'=>'string|max:250',
        ];
    }

    //RELACIÓN UNO A MUCHOS
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function branches (){
        return $this->belongsToMany(Branch::class);//MUCHOS A MUCHOS
    }
}
