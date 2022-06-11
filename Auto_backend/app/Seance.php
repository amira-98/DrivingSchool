<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $table='seances';
    protected $fillable=['date','HD','HF'];
    
    public function moniteur()
    {
        return $this->belongsTo('App\Moniteur');
    }

    public function vehicule()
    {
        return $this->belongsTo('App\Vehicule');
    }
    public function rapport()
    {
        return $this->hasOne(Rapport::class);
    }
    public function candidat()
    {
        return $this->belongsTo('App\Candidat');
    }
}
