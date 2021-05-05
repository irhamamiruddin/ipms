<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AmenityTypeA1;
use App\Models\CommercialTypeC1;
use App\Models\OtherTypeO1;
use App\Models\ResidentialTypeR1;
use App\Models\ResidentialTypeR2;
use App\Models\ResidentialTypeR3;

class ComponentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $type_a1 = AmenityTypeA1::all();
        $type_c1 = CommercialTypeC1::all();
        $type_o1 = OtherTypeO1::all();
        $type_r1 = ResidentialTypeR1::all();
        $type_r2 = ResidentialTypeR2::all();
        $type_r3 = ResidentialTypeR3::all();

        $data = compact(
            'type_a1',
            'type_c1',
            'type_o1',
            'type_r1',
            'type_r2',
            'type_r3'
        );
        return view('settings.development_components.index',$data);
    }

    //Type R1
    public function storeR1()
    {
        $r1 = New ResidentialTypeR1();
        $r1->type_r1 = request('type_r1');
        $r1->save();
        return redirect('/settings/development-components');
    }
    public function updateR1()
    {
        $id = request('id');
        $r1 = ResidentialTypeR1::findOrFail($id);
        $r1->type_r1 = request('type_r1');
        $r1->save();
        return redirect('/settings/development-components');
    }
    public function destroyR1($id)
    {
        $r1 = ResidentialTypeR1::findOrFail($id);
        $r1->delete();
        return redirect('/settings/development-components');
    }

    //Type R2
    public function storeR2()
    {
        $r2 = New ResidentialTypeR2();
        $r2->type_r2 = request('type_r2');
        $r2->save();
        return redirect('/settings/development-components');
    }
    public function updateR2()
    {
        $id = request('id');
        $r2 = ResidentialTypeR2::findOrFail($id);
        $r2->type_r2 = request('type_r2');
        $r2->save();
        return redirect('/settings/development-components');
    }
    public function destroyR2($id)
    {
        $r2 = ResidentialTypeR2::findOrFail($id);
        $r2->delete();
        return redirect('/settings/development-components');
    }

    //Type R3
    public function storeR3()
    {
        $r3 = New ResidentialTypeR3();
        $r3->type_r3 = request('type_r3');
        $r3->save();
        return redirect('/settings/development-components');
    }
    public function updateR3()
    {
        $id = request('id');
        $r3 = ResidentialTypeR3::findOrFail($id);
        $r3->type_r3 = request('type_r3');
        $r3->save();
        return redirect('/settings/development-components');
    }
    public function destroyR3($id)
    {
        $r3 = ResidentialTypeR3::findOrFail($id);
        $r3->delete();
        return redirect('/settings/development-components');
    }

    //Type A1
    public function storeA1()
    {
        $a1 = New AmenityTypeA1();
        $a1->type_a1 = request('type_a1');
        $a1->save();
        return redirect('/settings/development-components');
    }
    public function updateA1()
    {
        $id = request('id');
        $a1 = AmenityTypeA1::findOrFail($id);
        $a1->type_a1 = request('type_a1');
        $a1->save();
        return redirect('/settings/development-components');
    }
    public function destroyA1($id)
    {
        $a1 = AmenityTypeA1::findOrFail($id);
        $a1->delete();
        return redirect('/settings/development-components');
    }
    
    //Type C1
    public function storeC1()
    {
        $c1 = New CommercialTypeC1();
        $c1->type_c1 = request('type_c1');
        $c1->save();
        return redirect('/settings/development-components');
    }
    public function updateC1()
    {
        $id = request('id');
        $c1 = CommercialTypeC1::findOrFail($id);
        $c1->type_c1 = request('type_c1');
        $c1->save();
        return redirect('/settings/development-components');
    }
    public function destroyC1($id)
    {
        $c1 = CommercialTypeC1::findOrFail($id);
        $c1->delete();
        return redirect('/settings/development-components');
    }

    //Type O1
    public function storeO1()
    {
        $o1 = New OtherTypeO1();
        $o1->type_o1 = request('type_o1');
        $o1->save();
        return redirect('/settings/development-components');
    }
    public function updateO1()
    {
        $id = request('id');
        $o1 = OtherTypeO1::findOrFail($id);
        $o1->type_o1 = request('type_o1');
        $o1->save();
        return redirect('/settings/development-components');
    }
    public function destroyO1($id)
    {
        $o1 = OtherTypeO1::findOrFail($id);
        $o1->delete();
        return redirect('/settings/development-components');
    }
}
