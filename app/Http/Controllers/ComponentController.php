<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AmenityTypeA1;
use App\Models\CommercialTypeC1;
use App\Models\OtherTypeO1;
use App\Models\ResidentialTypeR1;
use App\Models\ResidentialTypeR2;
use App\Models\ResidentialTypeR3;
use App\Models\ActivityLog;
use Auth;

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
        
        if ($r1->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_r1');
            $log->class = "Residential Type R1";
            $log->action = "Add";

            $log->save();
        }

        return redirect('/settings/development-components');
    }
    public function updateR1()
    {
        $id = request('id');
        $r1 = ResidentialTypeR1::findOrFail($id);
        $r1->type_r1 = request('type_r1');

        if ($r1->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_r1');
            $log->class = "Residential Type R1";
            $log->action = "Update";

            $log->save();
        }

        return redirect('/settings/development-components');
    }
    public function destroyR1($id)
    {
        $r1 = ResidentialTypeR1::findOrFail($id);
        
        if ($r1->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $r1->type_r1;
            $log->class = "Residential Type R1";
            $log->action = "Delete";

            $log->save();
        }

        return redirect('/settings/development-components');
    }

    //Type R2
    public function storeR2()
    {
        $r2 = New ResidentialTypeR2();
        $r2->type_r2 = request('type_r2');

        if ($r2->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_r2');
            $log->class = "Residential Type R2";
            $log->action = "Add";

            $log->save();
        }

        return redirect('/settings/development-components');
    }
    public function updateR2()
    {
        $id = request('id');
        $r2 = ResidentialTypeR2::findOrFail($id);
        $r2->type_r2 = request('type_r2');
        if ($r2->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_r2');
            $log->class = "Residential Type R2";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/development-components');
    }
    public function destroyR2($id)
    {
        $r2 = ResidentialTypeR2::findOrFail($id);
        if ($r2->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $r2->type_r2;
            $log->class = "Residential Type R2";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/development-components');
    }

    //Type R3
    public function storeR3()
    {
        $r3 = New ResidentialTypeR3();
        $r3->type_r3 = request('type_r3');
        if ($r3->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_r3');
            $log->class = "Residential Type R3";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/development-components');
    }
    public function updateR3()
    {
        $id = request('id');
        $r3 = ResidentialTypeR3::findOrFail($id);
        $r3->type_r3 = request('type_r3');
        if ($r3->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_r3');
            $log->class = "Residential Type R3";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/development-components');
    }
    public function destroyR3($id)
    {
        $r3 = ResidentialTypeR3::findOrFail($id);
        if ($r3->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $r3->type_r3;
            $log->class = "Residential Type R3";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/development-components');
    }

    //Type A1
    public function storeA1()
    {
        $a1 = New AmenityTypeA1();
        $a1->type_a1 = request('type_a1');
        if ($a1->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_a1');
            $log->class = "Residential Type A1";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/development-components');
    }
    public function updateA1()
    {
        $id = request('id');
        $a1 = AmenityTypeA1::findOrFail($id);
        $a1->type_a1 = request('type_a1');
        if ($a1->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_a1');
            $log->class = "Residential Type A1";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/development-components');
    }
    public function destroyA1($id)
    {
        $a1 = AmenityTypeA1::findOrFail($id);
        if ($a1->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $a1->type_a1;
            $log->class = "Residential Type A1";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/development-components');
    }
    
    //Type C1
    public function storeC1()
    {
        $c1 = New CommercialTypeC1();
        $c1->type_c1 = request('type_c1');
        if ($c1->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_c1');
            $log->class = "Residential Type C1";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/development-components');
    }
    public function updateC1()
    {
        $id = request('id');
        $c1 = CommercialTypeC1::findOrFail($id);
        $c1->type_c1 = request('type_c1');
        if ($c1->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_c1');
            $log->class = "Residential Type C1";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/development-components');
    }
    public function destroyC1($id)
    {
        $c1 = CommercialTypeC1::findOrFail($id);
        if ($c1->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $c1->type_c1;
            $log->class = "Residential Type C1";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/development-components');
    }

    //Type O1
    public function storeO1()
    {
        $o1 = New OtherTypeO1();
        $o1->type_o1 = request('type_o1');
        if ($o1->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_o1');
            $log->class = "Residential Type O1";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/development-components');
    }
    public function updateO1()
    {
        $id = request('id');
        $o1 = OtherTypeO1::findOrFail($id);
        $o1->type_o1 = request('type_o1');
        if ($o1->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type_o1');
            $log->class = "Residential Type O1";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/development-components');
    }
    public function destroyO1($id)
    {
        $o1 = OtherTypeO1::findOrFail($id);
        if ($o1->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $o1->type_o1;
            $log->class = "Residential Type O1";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/development-components');
    }
}
