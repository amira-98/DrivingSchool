<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{   
    protected $table='vehicules';
    protected $fillable=['id', 'matricule', 'date_acq','modele','kilometrage','depense','type'];
    
 public function seances()
    {
        return $this->hasMany('App\Seance');
    }
    
}
