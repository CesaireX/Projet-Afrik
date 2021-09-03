<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objet extends Model
{
    use HasFactory;

    protected $fillable=[

        'titre','appel_id'

    ];


    public function appel()
    {
        return $this->belongsTo('App\Models\appel');
    }


    public function lot()
    {
        return $this->hasMany('App\Models\lot');
    }

    public function lot2()
    {
        return $this->belongsTo('App\Models\lot');
    }


}
