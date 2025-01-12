<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Poster extends Model implements TranslatableContract

{
    protected $guarded = ['id'];

    use Translatable;
    public $translatedAttributes = ['name', 'description'];

}
