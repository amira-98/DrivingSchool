<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moniteur extends Model
{
    //
    protected $table='moniteurs';
    protected $fillable=['id', 'nom', 'numero_tel', 'prenom', 'email','date_naissance'
    , 'pseudo', 'mot_de_passe', 'salaire'
    , 'date_embauche', 'cin'];

    public function seances()
    {
        return $this->hasMany('App\Seance');
    }
    
}
