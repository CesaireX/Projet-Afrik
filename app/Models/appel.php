<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appel extends Model
{
    use HasFactory;

    protected $fillable=[
        'id','dossier_id','Duree_Validite','Date_Publication'
    ];


    public function dossier()
    {
        return $this->belongsTo('App\Models\dossier');
    }


    public function objet()
    {
        return $this->hasMany('App\Models\objet');
    }

    public function objet2()
    {
        return $this->belongsTo('App\Models\objet');
    }

}

