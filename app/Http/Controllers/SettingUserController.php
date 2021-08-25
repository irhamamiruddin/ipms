<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\ActivityLog;
use Auth;

class SettingUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:setting-user');
    }

    public function index()
    {
        $users = User::all();

        return view('settings.users.index',['users'=>$users]);
    }

    public function create()
    {
        $roles = Role::pluck('name','name');

        $sp_roles = [
            'Not Specified' => 'Not Specified',
            'Beneficiaries' => 'Beneficiaries',
            'Consultant' => 'Consultant'
        ];
        $status = [
            'Active' => 'Active',
            'Not Active' => 'Not Active'
        ];

        $data = compact(
            'roles',
            'sp_roles',
            'status'
        );

        return view('settings.users.create', $data);
    }

    public function store()
    {
        $user = New User();

        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->role = request('role');

        if ($user->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('name');
            $log->class = "User";
            $log->action = "Add";

            $log->save();
        }

        return redirect('/settings/users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::pluck('name','name');

        $sp_roles = [
            'Not Specified' => 'Not Specified',
            'Officer in Charge' => 'Officer in Charge',
            'Relief Officer in Charge' => 'Relief Officer in Charge',
            'Beneficiaries' => 'Beneficiaries',
            'Consultant' => 'Consultant'
        ];
        $status = [
            'Active' => 'Active',
            'Not Active' => 'Not Active'
        ];

        $data = compact(
            'user',
            'roles',
            'sp_roles',
            'status'
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
        $user->role = request('role');

        if ($user->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('name');
            $log->class = "User";
            $log->action = "Update";

            $log->save();
        }

        return redirect('/settings/users');
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
