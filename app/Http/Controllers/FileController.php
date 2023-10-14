<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::Select()
        // ->orderBy('name')
        // ->paginate(5);
        // $files = File::with('fileHasUser')->get();
        $files = File::with('fileHasUser')->Select()->paginate(5);
        return view('files.index', ['files'=>$files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title_fr'    => 'required|string|unique:forums,title_fr|min:3',
            'title_en'    => 'required|string|unique:forums,title_en|min:3',
            'name'        => 'required|file|mimes:pdf,zip,doc|max:2048'
        ];
        
        $request->validate($rules);

        // Enregistrement du fichier
        $path = $request->file('name')->store('public');

        // Récupération du nom du fichier à partir du chemin
        $fileName = basename($path);

        $newFile = File::create([
            'title_fr'  => $request->title_fr,
            'title_en'  => $request->title_en,
            'name'      => $fileName,
            'user_id'   => $request->user_id
        ]);

        return redirect(route('files.index'))->withSuccess(trans('lang.text_file_added')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $selectedFile)
    {
        $file = File::where('id', $selectedFile->id)->first();
        $user = $file->fileHasUser;

        return view('files.file', ['file' => $file, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $selectedFile)
    {
        return view('files.edit', ['file' => $selectedFile]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $selectedFile)
    {
        $rules = [
            'title_fr'    => 'required|string|min:3',
            'title_en'    => 'required|string|min:3'
        ];
        
        $request->validate($rules);
        
        $selectedFile->update([
            'title_fr'  => $request->title_fr,
            'title_en'  => $request->title_en
        ]);

        return redirect(route('files.show', $selectedFile->id))->withSuccess(trans('lang.text_file_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $selectedFile)
    {
        $selectedFile->delete();

        return redirect(route('files.index'))->withSuccess(trans('lang.text_file_deleted')); 
    }
}
