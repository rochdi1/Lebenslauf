<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function experiences()
    {
        return $this->hasMany('App\Experience');
    }

    public function formations()
    {
        return $this->hasMany('App\formations');
    }

    public function competences()
    {
        return $this->hasMany('App\competences');
    }

    public function projets()
    {
        return $this->hasMany('App\projets');
    }

 

    public function portfolio()
    {
        return $this->hasMany('App\portfolio');
    }
}
