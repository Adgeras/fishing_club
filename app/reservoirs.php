<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservoirs extends Model
{
    public $fillable = ['title', 'area', 'about'];

    public function members()
    {
        return $this->hasMany('App\members');
    }
}
