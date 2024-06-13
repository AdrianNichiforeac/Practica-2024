<?php

namespace App\Http\Controllers\Admin;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function files($parent_id, $fileable_type){
        $files = File::where('fileable_id', $parent_id)->where('fileable_type', $fileable_type)->get();
        return view('admin.components.files.files', ['files' => $files]);
    }


    public function storeFile(Request $request, $parent_id){
        request()->validate([
            'name' => ['string', 'max:255'],
            'file'  => 'required|mimes:txt,pdf,xlx,png,jpg,doc,docx',
            'fileable_type' => 'in:Page,News,Project,Product'
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('public/files', $fileName);

        $fileable_type = request('fileable_type');
        $fileable_type = "App\\$fileable_type";

        File::create(
            [
                'name' => $fileName,
                'file' => 'files/'.$fileName,
                'fileable_id' => $parent_id,
                'fileable_type' => $fileable_type,
            ]
        );

        return redirect()->route('files.main', [$parent_id, $fileable_type]);
    }

    public function destroyFile($parent_id){
        request()->validate([
            'id' => ['required','integer']
        ]);

        $file = File::find(request('id'));

        $fileable_type = $file->fileable_type;
        Storage::delete($file->file);
        $file->delete();

        $file = File::where('fileable_id', $parent_id)->where('fileable_type', $fileable_type)->get();
        return view('admin.components.files.files', ['files' => $file]);
    }


}
