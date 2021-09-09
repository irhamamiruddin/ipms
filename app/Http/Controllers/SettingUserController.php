<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use App\Models\ActivityLog;
use Auth;
use Bouncer;

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'unique:contacts', 'unique:companies'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => $request->input('status')
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'class' => 'User',
            'action' => 'Add',
        ]);
        
        $role = $request->input('role');
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

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->has('name')) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:contacts', 'unique:companies', 'unique:users,email,'.$user->id]
            ]);

            $user->fill([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);

            //If request from edit, else from profile
            if ($request->has('role')) {
                $user->status = $request->input('status');
                $user->save();

                $role = $request->input('role');
                Bouncer::sync($user)->roles($role);
            } else {
                if ($request->has('image')) {
                    $user->image = $request->image->store('images');
                }
                $user->save();
            }

            ActivityLog::create([
                'user_id' => Auth::id(),
                'name' => $request->input('name'),
                'class' => 'User',
                'action' => 'Update',
            ]);

            return back()->with('success', 'Updated Succesfully!');
        }

        if ($request->has('password')) {
            $request->validate([
                'current_password' => ['required'],
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors('Current password does not match!');
            }

            $user->password = Hash::make($request->password);
            $user->save();

            ActivityLog::create([
                'user_id' => Auth::id(),
                'name' => $user->name,
                'class' => 'User',
                'action' => 'Changed Password',
            ]);

            return back()->with('success', 'Password Changed Succesfully!');
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
            return back()->with('alert', 'Deletion failed! Data currently in use!');
        }

        if ($user->delete()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'name' => $user->name,
                'class' => 'User',
                'action' => 'Delete',
            ]);
        }

        return redirect('/settings/users');
    }

    public function change_password($id) 
    {
        return view('settings.users.change_password')->with('id',$id);
    }
}
