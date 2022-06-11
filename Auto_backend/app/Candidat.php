<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
     //
     protected $table='candidats';
     protected $fillable=['id', 'nom', 'numero_tel', 'prenom', 'email',' date_naissance', 'pseudo', 'mot_de_passe',
     'date_inscription', 'cin'];
 
     public function seances()
     {
         return $this->hasMany('App\Seance');
     }
     
}
