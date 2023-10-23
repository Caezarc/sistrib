<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    use HasFactory;
  //relacion inversa
  public function user(){
    return $this->belongsto('App\models\User');
  }

  //relacion inversa
  public function cliente(){
    return $this->belongsto('App\models\cliente');
  }
   
}