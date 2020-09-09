<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    public $fillable = ['name', 'surname', 'live', 'experience', 'registered', 'reservoir_id'];

    public function reservoir()
    {
        return $this->belongsTo('App\reservoirs');
    }
}