<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosterTranslation extends Model
{

    protected $fillable = ['name', 'description'];
    public $timestamps = false;
}
