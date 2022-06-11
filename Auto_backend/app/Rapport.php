<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{   public $table='rapports';
  public $fillable=['id','seance_id'];
    public function resultats()
    {
      return  $this->hasMany('App\Resutat');
    }
    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }
}
