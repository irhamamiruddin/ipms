<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\ActivityLog;
use Auth;

class UserRoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('settings.users.roles.index', ['roles'=>$roles]);
    }

    public function create()
    {
        return view('settings.users.roles.create');
    }

    public function store()
    {
        $role = New Role();

        $role->name = request('name');

        if ($role->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('name');
            $log->class = "User Role";
            $log->action = "Add";

            $log->save();
        }

        return redirect('/settings/user-roles');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('settings.users.roles.edit',['role'=>$role]);
    }

    public function update($id)
    {
        $role = Role::findOrFail($id);

        $role->name = request('name');

        if ($role->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('name');
            $log->class = "User Role";
            $log->action = "Update";

            $log->save();
        }

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
