<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\LibraryType;
use App\Models\Project;
use App\Models\ActivityLog;
use Auth;


class LibraryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function store()
    {
        $libraries = new Library();
        
        $libraries->project_id = request('project');
        $libraries->name = request('name');
        $libraries->type = request('type');

        if ($libraries->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('name');
            $log->class = "Library";
            $log->action = "Add";

            $log->save();
        }

        
        return redirect('/libraries');
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

    public function update()
    {
        $id = request('id');

        $library = Library::findOrFail($id);
        
        $library->project_id = request('project');
        $library->name = request('name');
        $library->type = request('type');

        if ($library->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('name');
            $log->class = "Library";
            $log->action = "Update";

            $log->save();
        }

        
        return redirect('/libraries');
    }

    public function destroy($id){

        $library = Library::findOrFail($id);
        if ($library->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $library->name;
            $log->class = "Library";
            $log->action = "Delete";

            $log->save();
        }

        
        return redirect('/libraries');
    }
}
