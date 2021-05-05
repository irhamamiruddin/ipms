<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogNature;
use App\Models\LogLevel1;
use App\Models\LogLevel2;
use App\Models\LogLevel3;

class LogSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $nature->save();
        return redirect('/settings/logs');
    }
    public function updateNature()
    {
        $id = request('id');
        $nature = LogNature::findOrFail($id);
        $nature->nature = request('nature');
        $nature->save();
        return redirect('/settings/logs');
    }
    public function destroyNature($id)
    {
        $nature = LogNature::findOrFail($id);
        $nature->delete();
        return redirect('/settings/logs');
    }

    //Level 1
    public function storeLevel1()
    {
        $level_1 = New LogLevel1();
        $level_1->level_1 = request('level_1');
        $level_1->save();
        return redirect('/settings/logs');
    }
    public function updateLevel1()
    {
        $id = request('id');
        $level_1 = LogLevel1::findOrFail($id);
        $level_1->level_1 = request('level_1');
        $level_1->save();
        return redirect('/settings/logs');
    }
    public function destroyLevel1($id)
    {
        $level_1 = LogLevel1::findOrFail($id);
        $level_1->delete();
        return redirect('/settings/logs');
    }

    //Level 2
    public function storeLevel2()
    {
        $level_2 = New LogLevel2();
        $level_2->level_2 = request('level_2');
        $level_2->level_1 = request('level_1');
        $level_2->save();
        return redirect('/settings/logs');
    }
    public function updateLevel2()
    {
        $id = request('id');
        $level_2 = LogLevel2::findOrFail($id);
        $level_2->level_2 = request('level_2');
        $level_2->level_1 = request('level_1');
        $level_2->save();
        return redirect('/settings/logs');
    }
    public function destroyLevel2($id)
    {
        $level_2 = LogLevel2::findOrFail($id);
        $level_2->delete();
        return redirect('/settings/logs');
    }

    //Level 3
    public function storeLevel3()
    {
        $level_3 = New LogLevel3();
        $level_3->level_3 = request('level_3');
        $level_3->level_2 = request('level_2');
        $level_3->save();
        return redirect('/settings/logs');
    }
    public function updateLevel3()
    {
        $id = request('id');
        $level_3 = LogLevel3::findOrFail($id);
        $level_3->level_3 = request('level_3');
        $level_3->level_2 = request('level_2');
        $level_3->save();
        return redirect('/settings/logs');
    }
    public function destroyLevel3($id)
    {
        $level_3 = LogLevel3::findOrFail($id);
        $level_3->delete();
        return redirect('/settings/logs');
    }
}
