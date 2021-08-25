<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lot extends Model
{
    use HasFactory;

    protected $fillable=[

        'lot','objet_id'

    ];

    public function objet()
    {
        return $this->belongsTo('App\Models\objet');
    }

    public function caution()
    {
        return $this->hasMany('App\Models\caution');
    }
}
