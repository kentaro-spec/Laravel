<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Stock;


class Review extends Model
{

//
  protected $guarded = [
      'id'
  ];

  public function stock()
   {
       return $this->belongsTo('\App\Models\Stock');
   }
}


