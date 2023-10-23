<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;

    //relacion uno a muchos
    public function compras(){
        return $this->hasMany('App\Models\compra');
     }

     //relacion uno a muchos
    public function ventas(){
        return $this->hasMany('App\Models\venta');
     }
}