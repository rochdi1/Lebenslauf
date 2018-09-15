<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    //
    protected $fillable = ['titre', 'description', 'lien', 'image'];

    public function cv() {
    	return $this->belongsTo("App\Cv");
    }
}
