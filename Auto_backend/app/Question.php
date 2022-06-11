<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function resultat()
    {
      return  $this->hasMany('App\Resutat');
    }
}
