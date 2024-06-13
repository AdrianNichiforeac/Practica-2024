<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class GalleryPost extends Model implements TranslatableContract
{
    protected $guarded = ['id'];

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    use Translatable;
    public $translatedAttributes = ['name'];
}
