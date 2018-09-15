<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class competences extends Model
{
    //
    protected $fillable = ['titre', 'lien', 'image'];

    public function cv()
    {
        return $this->belongsTo("App\Cv");
    }
}
