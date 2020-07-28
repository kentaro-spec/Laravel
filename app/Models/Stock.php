<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $guarded = [
        'id'
      ];

      // バリデーション
      public static $rules = array(
        'name' => 'required',
        'detail' => 'required',
        'fee' => 'required',
        'imgpath' => 'required',
      );

      public function reviews () {
        return $this->hasMany('App\Models\Review');
      }
}
