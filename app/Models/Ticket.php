<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    protected $fillable =['reference_number','issue','subtotal','total','iva','user_id','branch_id']; //SE PODRÁ INSERTAR CUALQUIER DATO SIN NECESIDAD DE UN TOKEN
    
    public static function validationRules(){
        return[
            'reference_number'=>'required',
            'issue'=>'required',
            'subtotal'=>'required',
            'total'=>'required',
            'iva'=>'required',
            'user_id'=>'required',
            'branch_id'=>'required',
        ];
    }

    public function products (){
        return $this->belongsToMany(Product::class);//MUCHOS A MUCHOS
    }

    public function invoice (){
        return $this->hasOne(Invoice::class);//UNO A UNO
    }
    public function branch (){
        return $this->belongsTo(Branch::class);//uno A MUCHOS INVERSA
    }
    public function user(){
        return $this->belongsTo(User::class);//UNO A MUCHOS INVERSA
    }
}
