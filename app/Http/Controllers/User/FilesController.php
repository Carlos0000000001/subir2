<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Models\File;


class FilesController extends Controller
{

    public function index()
    {
        
        //
    }
    public function create()
    {

        //
    }

    public function store(Request $request)
    {
        ini_set('upload_max_filesize', '1G');
        $user_id = Auth::user()->id;
        $files = $request->file('files');

        if(!$request->hasFile('files'))
        {
            return "No ha subido Archivos";
        }

        foreach($files as $file)
        {
            if(Storage::putFileAs('archivos/'.$user_id.'/',$file,$file->getClientOriginalName()))
            {
                File::create([
                    'name' => $file->getClientOriginalName(),
                    'user_id' => $user_id
                ]);
            }
        }
       return "Archivos subidos satisfactoriamente";

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
