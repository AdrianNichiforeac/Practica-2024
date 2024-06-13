<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class News extends Model implements TranslatableContract
{

    protected $guarded = ['id'];
    public function images()
    {
        return $this->morphMany('App\ImageModel', 'imageable');
    }

    public function page(){
        return $this->belongsTo(Page::class, 'parent');
    }

    public function files()
    {
        return $this->morphMany('App\File', 'fileable');
    }
    use Translatable;
    public $translatedAttributes = ['name', 'content'];

    public function getNameAttribute(){
        return $this->translate(app()->getLocale())['name'];
    }

    /**
     * Rewrite Content Getter (translatable)
     * @return mixed
     */
    public function getContentAttribute(){
        return $this->translate(app()->getLocale())['content'];
    }


}
