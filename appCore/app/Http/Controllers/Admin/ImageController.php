<?php

namespace App\Http\Controllers\Admin;

use App\ImageModel;
use App\Classes\ImageLogic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function gallery($parent_id, $imageable_type){
        $images = ImageModel::where('imageable_id', $parent_id)->where('imageable_type', $imageable_type)->get();
        return view('admin.components.gallery.images', ['images' => $images]);
    }

    public function storeImage(Request $request, $parent_id){
        request()->validate([
            'picture'  => 'required|mimes:jpeg,bmp,png,jpg|max:10240',
            'picture_small'  => 'mimes:jpeg,bmp,png,jpg|max:10240',
            'imageable_type' => 'in:News,Page,GalleryPost'
        ]);

        $image = new ImageLogic();
        $image -> originalImage = $request->file('picture');
        $image -> path = '/gallery/';

        $image->storeImage();
        $picture_link = $image->pictureLink;

        $image_small = new ImageLogic();
        $image_small -> originalImage = $request->file('picture');
        $image_small -> path = '/small_gallery/';
        $image_small->length = 360;
        $image_small->height = 250;
        $image_small->storeImage();
        $picture_small_link = $image_small->pictureLink;


        $imageable_type = request('imageable_type');
        $imageable_type = "App\\$imageable_type";

        ImageModel::create([
            'picture' => $picture_link,
            'picture_small' => $picture_small_link,
            'imageable_id' => $parent_id,
            'imageable_type' => $imageable_type,
            'ord' =>1,
        ]);

        return redirect()->route('images.gallery', [$parent_id, $imageable_type]);
    }

    public function destroyImage($parent_id){
        request()->validate([
            'id' => ['required','integer']
        ]);

        $image = ImageModel::find(request('id'));

        $imageable_type = $image->imageable_type;
        Storage::delete($image->picture);
        Storage::delete($image->picture_small);
        $image->delete();

        $images = ImageModel::where('imageable_id', $parent_id)->where('imageable_type', $imageable_type)->get();
        return view('admin.components.gallery.images', ['images' => $images]);
    }
}
