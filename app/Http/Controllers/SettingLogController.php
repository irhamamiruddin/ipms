<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogNature;
use App\Models\LogLevel1;
use App\Models\LogLevel2;
use App\Models\LogLevel3;
use App\Models\ActivityLog;
use Auth;


class SettingLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:setting-log');
    }

    public function index()
    {
        $log_natures = LogNature::all();
        $level_1 = LogLevel1::all();
        $level_2 = LogLevel2::all();
        $level_3 = LogLevel3::all();

        $data = compact(
            'log_natures',
            'level_1',
            'level_2',
            'level_3'
        );
        return view('settings.logs.index',$data);
    }

    //Log Nature
    public function storeNature()
    {
        $nature = New LogNature();
        $nature->nature = request('nature');
        if ($nature->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('nature');
            $log->class = "Log Nature";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/logs');
    }
    public function updateNature()
    {
        $id = request('id');
        $nature = LogNature::findOrFail($id);
        $nature->nature = request('nature');
        if ($nature->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('nature');
            $log->class = "Log Nature";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/logs');
    }
    public function destroyNature($id)
    {
        $nature = LogNature::findOrFail($id);
        if ($nature->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $nature->nature;
            $log->class = "Log Nature";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/logs');
    }

    //Level 1
    public function storeLevel1()
    {
        $level_1 = New LogLevel1();
        $level_1->level_1 = request('level_1');
        if ($level_1->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('level_1');
            $log->class = "Log Level 1";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/logs');
    }
    public function updateLevel1()
    {
        $id = request('id');
        $level_1 = LogLevel1::findOrFail($id);
        $level_1->level_1 = request('level_1');
        if ($level_1->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('level_1');
            $log->class = "Log Level 1";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/logs');
    }
    public function destroyLevel1($id)
    {
        $level_1 = LogLevel1::findOrFail($id);
        if ($level_1->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $level_1->level_1;
            $log->class = "Log Level 1";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/logs');
    }

    //Level 2
    public function storeLevel2()
    {
        $level_2 = New LogLevel2();
        $level_2->level_2 = request('level_2');
        $level_2->level_1 = request('level_1');
        if ($level_2->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('level_2');
            $log->class = "Log Level 2";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/logs');
    }
    public function updateLevel2()
    {
        $id = request('id');
        $level_2 = LogLevel2::findOrFail($id);
        $level_2->level_2 = request('level_2');
        $level_2->level_1 = request('level_1');
        if ($level_2->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('level_2');
            $log->class = "Log Level 2";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/logs');
    }
    public function destroyLevel2($id)
    {
        $level_2 = LogLevel2::findOrFail($id);
        if ($level_2->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $level_2->level_2;
            $log->class = "Log Level 2";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/logs');
    }

    //Level 3
    public function storeLevel3()
    {
        $level_3 = New LogLevel3();
        $level_3->level_3 = request('level_3');
        $level_3->level_2 = request('level_2');
        if ($level_3->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('level_3');
            $log->class = "Log Level 3";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/logs');
    }
    public function updateLevel3()
    {
        $id = request('id');
        $level_3 = LogLevel3::findOrFail($id);
        $level_3->level_3 = request('level_3');
        $level_3->level_2 = request('level_2');
        if ($level_3->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('level_3');
            $log->class = "Log Level 3";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/logs');
    }
    public function destroyLevel3($id)
    {
        $level_3 = LogLevel3::findOrFail($id);
        if ($level_3->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $level_3->level_3;
            $log->class = "Log Level 3";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/logs');
    }
}
