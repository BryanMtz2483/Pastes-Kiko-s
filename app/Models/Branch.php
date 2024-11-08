<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory;

    protected $fillable =['name','phone','address','rfc'];

    public static function validationRules(){
        return[
            'name'=>'string|required|max:50',
            'phone'=>'string|max:20',
            'address'=>'string|max:250'
        ];
    }

    public function tickets (){
        return $this->hasMany(Ticket::class);//UNO A MUCHOS
    }
    public function products (){
        return $this->belongsToMany(Product::class);//MUCHOS A MUCHOS
    }
    public function suppliers (){
        return $this->belongsToMany(Supplier::class);//MUCHOS A MUCHOS
    }
    public function users (){
        return $this->hasMany(User::class);//UNO A MUCHOS
    }
}
