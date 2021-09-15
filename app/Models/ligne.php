<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligne extends Model
{
    use HasFactory;

    protected $fillable=[

        'Garant','caution_id','Montant_Ligne','lot'

    ];


    public function caution()
    {
        return $this->belongsTo('App\Models\caution');
    }

}
