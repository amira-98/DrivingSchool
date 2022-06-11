<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resulat extends Model
{  public $table='resulats';
    public $fillable=['id','contenu'];
    public function question()
    {
      return  $this->belongsTo('App\Question');
    }

    public function rapport()
    {
        return $this->belongsTo('App\Rapport');
    }

}
