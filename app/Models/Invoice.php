<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;

    protected $fillable =['emission','ticket_id']; //SE PODRÁ INSERTAR CUALQUIER DATO SIN NECESIDAD DE UN TOKEN
     
    public static function validationRules(){
        return[
            'emission' => 'required',
            'ticket_id' => 'required',

        ];
    }

    public function ticket (){
        return $this->belongsTo(Ticket::class);//UNO A UNO, BELONGS ES A QUIEN PERTENECE.
    }
}
