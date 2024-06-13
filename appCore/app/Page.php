<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Page extends Model implements TranslatableContract
{
    protected $guarded = ['id'];
    use Translatable;
    public $translatedAttributes = ['name', 'content'];

    public function SubPages(){
        return $this->hasMany(Page::class, 'parent')->orderBy('ord');
    }

    public function news(){
        return $this->hasMany(News::class, 'parent');
    }

    public function activeNews(){
        return $this->news()->where('active','=', 1)->get();
    }

    public function Parent(){
        return $this->belongsTo(Page::class, 'parent');
    }

    public function images()
    {
        return $this->morphMany('App\ImageModel', 'imageable');
    }

    public function files()
    {
        return $this->morphMany('App\File', 'fileable');
    }


    /**
     * Rewrite Content Getter (translatable)
     * @return mixed
     */
    public function getNameAttribute(){
        return $this->translate(app()->getLocale())['name'];
    }

    public function getContentAttribute(){
        return $this->translate(app()->getLocale())['content'];
    }
}
