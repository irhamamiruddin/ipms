<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

        $user->save();

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

    public function update()
    {
        $id = request('id');

        $user = User::findOrFail($id);

        $user->name = request('name');
        $user->email = request('email');
        if(request('password') != NULL) {
            $user->password = Hash::make(request('password'));
        }
        $user->role = request('role');

        $user->save();

        return redirect('/settings/users');
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();

        
        return redirect('/settings/users');
    }

    //Roles
    public function roleIndex()
    {
        $roles = Role::all();

        return view('settings.users.roles.index', ['roles'=>$roles]);
    }

    public function roleCreate()
    {
        return view('settings.users.roles.create');
    }

    public function roleStore()
    {
        $role = New Role();

        $role->name = request('name');

        $role->save();

        return redirect('/settings/users/roles/index');
    }

    public function roleEdit($id)
    {
        $role = Role::findOrFail($id);

        return view('settings.users.roles.edit',['role'=>$role]);
    }

    public function roleUpdate()
    {
        $id = request('id');

        $role = Role::findOrFail($id);

        $role->name = request('name');

        $role->save();

        return redirect('/settings/users/roles/index');
    }

    public function roleDestroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect('/settings/users/roles/index');
    }

}