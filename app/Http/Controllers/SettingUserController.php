<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\ActivityLog;
use Auth;
use Bouncer;
use Illuminate\Support\Str;

class SettingUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:user-index', ['only' => ['index']]);
        $this->middleware('can:user-create', ['only' => ['create']]);
        $this->middleware('can:user-edit', ['only' => ['edit']]);
        $this->middleware('can:user-update', ['only' => ['update']]);
        $this->middleware('can:user-delete', ['only' => ['delete']]);
    }

    public function index()
    {
        $users = User::all();

        return view('settings.users.index',['users'=>$users]);
    }

    public function profile($id)
    {
        if (Auth::id() != $id) {
            abort(403,"Can not access");
        }
        
        $user = User::findOrFail($id);
        
        return view('profile')->with('user',$user);
    }

    public function create()
    {
        $roles = Role::all();

        $data = compact(
            'roles'
        );

        return view('settings.users.create', $data);
    }

    public function store()
    {
        $user = New User();

        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->status = request('status');
        $role = request('role');

        if ($user->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('name');
            $log->class = "User";
            $log->action = "Add";

            $log->save();
        }

        Bouncer::assign($role)->to($user);

        return redirect('/settings/users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::all();

        $user_role = $user->roles->first();

        $data = compact(
            'user',
            'roles',
            'user_role'
        );

        return view('settings.users.edit', $data);
    }

    public function update($id)
    {
        $user = User::findOrFail($id);

        $user->name = request('name');
        $user->email = request('email');
        if(request('password') != NULL) {
            $user->password = Hash::make(request('password'));
        }
        if(request('status') !== NULL) {
            $user->status = request('status');
        }
        if(request('role') !== NULL) {
            $role = request('role');
        }
        if (request('image') != NULL) {
            $string = Str::random(16);
            $user->image = request('image')->storeAs('image',$string.'.jpg');
        }

        if ($user->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('name');
            $log->class = "User";
            $log->action = "Update";

            $log->save();
        }

        if (request('status') !== NULL && request('role') !== NULL) {
            Bouncer::sync($user)->roles($role);

            return redirect('/settings/users');
        } else {
            return redirect('/profile/'.$id);
        }
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);

        if ($user->land_officer_in_charge()->exists() ||
            $user->land_relief_officer_in_charge()->exists() ||
            $user->project_officer_in_charge()->exists() ||
            $user->project_relief_officer_in_charge()->exists() ||
            $user->contacts()->exists() ||
            $user->activity_logs()->exists()
        ) {
            return redirect()->back()->with('alert', 'Delete failed! Data currently in use!');
        }

        if ($user->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $user->name;
            $log->class = "User";
            $log->action = "Delete";

            $log->save();
        }

        
        return redirect('/settings/users');
    }
}
