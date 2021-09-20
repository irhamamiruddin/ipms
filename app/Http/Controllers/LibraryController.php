<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Library;
use App\Models\LibraryType;
use App\Models\Project;
use App\Models\ActivityLog;
use App\Models\File;
use Auth;


class LibraryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:library');
    }

    public function index()
    {
        $libraries = Library::all();
        $types = LibraryType::all();
        $projects = Project::all();

        $data = compact(
            'libraries',
            'projects',
            'types'
        );
        
        return view('libraries.index', $data);
    }

    public function store(Request $request)
    {
        $project = Project::findOrFail($request->input('project'));

        $library = $project->libraries()->create($request->all());

        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'class' => 'Library',
            'action' => 'Add',
        ]);

        if ($request->has('file')) {
            $string = Str::random(16);

            $filename = $request->file->getClientOriginalName();
            $extension = $request->file->getClientOriginalExtension();
            $filepath = $request->file->storeAs('file', $string . '.' .$extension);
            
            $file = new File([
                'filename' => $filename,
                'extension' => $extension,
                'filepath' => $filepath,
            ]);

            $library->files()->save($file);
        }

        return redirect('/libraries')->with('success','Created Successfully!');
    }

    public function edit($id)
    {
        $library = Library::findOrFail($id);
        $types = LibraryType::all();
        $projects = Project::all();

        $data = compact(
            'library',
            'projects',
            'types'
        );
        
        return view('libraries.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $library = Library::findOrFail($id);

        $library->update($request->all());

        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'class' => 'Library',
            'action' => 'Update',
        ]);

        if ($request->has('file')) {
            $string = Str::random(16);

            $filename = $request->file->getClientOriginalName();
            $extension = $request->file->getClientOriginalExtension();
            $filepath = $request->file->storeAs('file', $string . '.' .$extension);
            
            $file = new File([
                'filename' => $filename,
                'extension' => $extension,
                'filepath' => $filepath,
            ]);

            $library->files()->save($file);
        }

        
        return redirect('/libraries')->with('success','Edited Successfully!');
    }

    public function destroy($id){

        $library = Library::findOrFail($id);
        if ($library->delete()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'name' => $library->name,
                'class' => 'Library',
                'action' => 'Delete',
            ]);
        }

        
        return redirect('/libraries')->with('success','Deleted Successfully!');
    }

    public function download($id) {
        $file = File::find($id);

        return Storage::download($file->filepath, $file->filename);
    }
}
