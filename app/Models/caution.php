<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caution extends Model
{
    use HasFactory;

    protected $fillable=[

        'lot_id','Type_Caution','Garant','Montant','Date_Soumission','Date_effet','Duree_Validite','Ligne','status'

    ];

    public function lot()
    {
        return $this->belongsTo('App\Models\lot');
    }



    public function ligne()
    {
        return $this->hasMany('App\Models\ligne');
    }


}
