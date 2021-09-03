<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dossier extends Model
{
    use HasFactory;

    protected $fillable = [
         'NomDossier',
    ];
/**
 * Get all of the comments for the dossier
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function appel()
{
    return $this->hasMany('App\Models\appel');
}



   public function appel2()
   {
       return $this->belongsTo('App\Models\appel');
   }

}
