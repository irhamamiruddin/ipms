<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\ActivityLog;
use App\Models\User;
use Auth;
use Bouncer;

class UserRoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('settings.users.roles.index', ['roles'=>$roles]);
    }

    public function create()
    {
        $abilities = Bouncer::ability()->all()->sortBy('name');
        $modules = ['Contact','Company','Land','Project','Report','Library','Setting'];

        return view('settings.users.roles.create', ['abilities'=>$abilities, 'modules'=>$modules]);
    }

    public function store()
    {
        $abilities = request('abilities');
        if (empty($abilities)) {
           $abilities= [];
        }

        $name = request('name');
        $title = request('title');

        $role = Bouncer::role()->firstOrCreate([ 'name' => $name, 'title' => $title, ]);
        
        Bouncer::sync($role)->abilities($abilities);

        $log = New ActivityLog();

        $log->user_id = Auth::id();
        $log->name = request('title');
        $log->class = "User Role";
        $log->action = "Add";

        $log->save();

        return redirect('/settings/user-roles');
    }

    public function edit($id)
    {
        $role = Bouncer::role()->where('id', $id)->first();
        $role->abilities = $role->getAbilities();
        $abilities = Bouncer::ability()->all()->sortBy('name');
        $modules = ['Contact','Company','Land','Project','Report','Library','Setting'];

        $data = compact(
            'role',
            'abilities',
            'modules'
        );

        return view('settings.users.roles.edit', $data);
    }

    public function update($id)
    {
        $abilities = request('abilities');
        if (empty($abilities)) {
           $abilities= [];
        }

        $role = Bouncer::role()->where('id', $id)->first();

        $role->name = request('name');
        $role->title = request('title');
        $role->save();

        Bouncer::sync($role)->abilities($abilities);

        $log = New ActivityLog();

        $log->user_id = Auth::id();
        $log->name = request('title');
        $log->class = "User Role";
        $log->action = "Update";

        $log->save();

        return redirect('/settings/user-roles');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if ($role->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $role->name;
            $log->class = "User Role";
            $log->action = "Delete";

            $log->save();
        }


        return redirect('/settings/user-roles');
    }
}
