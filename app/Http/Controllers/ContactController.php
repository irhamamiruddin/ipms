<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Exports\ContactFromView;
use App\Models\Contact;
use App\Models\Company;
use App\Models\User;
use App\Models\ActivityLog;
use Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:contact-index', ['only' => ['index']]);
        $this->middleware('can:contact-create', ['only' => ['create']]);
        $this->middleware('can:contact-edit', ['only' => ['edit']]);
        $this->middleware('can:contact-destroy', ['only' => ['destroy']]);
    }

    public function index()
    {
        $contacts = Contact::all();

        
        return view('contacts.index',['contacts'=>$contacts]);
    }

    public function create()
    {
        $companies = Company::all();
        $users = User::all();

        $data = compact(
            'companies',
            'users'
        );

        return view('contacts.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['email', 'max:255', 'unique:users', 'unique:contacts', 'unique:companies']
        ]);

        $contact = Contact::create($request->all());
        if ($request->has('image')) {
            $contact->image = $request->image->store('images');
            $contact->save();
        }
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'class' => 'Contact',
            'action' => 'Add',
        ]);

        if ($request->has('company_id')) {
            $company_id = $request->input('company_id');
            $submitted_c_role = $request->input('submitted_c_role');

            for($i = 0; $i < count($company_id); $i++) {
                $contact->companies()->attach($company_id[$i], ['role' => $submitted_c_role[$i]]);
            }
        }

        if ($request->has('user_id')) {
            $user_id = $request->input('user_id');
            $submitted_u_role = $request->input('submitted_u_role');

            for($j = 0; $j < count($user_id); $j++) {
                $contact->users()->attach($user_id[$j], ['role' => $submitted_u_role[$j]]);
            }
        }

        return redirect('/contacts')->with('success','Created Successfully!');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        
        return view('contacts.show',['contact'=>$contact]);
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        $companies = Company::all();
        $users = User::all();

        $data = compact(
            'companies',
            'users',
            'contact'
        );
        
        return view('contacts.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => ['email', 'max:255', 'unique:users', 'unique:contacts,email,'.$id, 'unique:companies']
        ]);
        
        $contact = Contact::findOrFail($id);
        $contact->fill($request->all());
        if ($request->has('image')) {
            $contact->image = $request->image->store('images');
        }
        $contact->save();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'class' => 'Contact',
            'action' => 'Edit',
        ]);

        if ($request->has('company_id')) {
            $company_id = $request->input('company_id');
            $submitted_c_role = $request->input('submitted_c_role');

            for($i = 0; $i < count($company_id); $i++) {
                $contact->companies()->attach($company_id[$i], ['role' => $submitted_c_role[$i]]);
            }
        }

        if ($request->has('user_id')) {
            $user_id = $request->input('user_id');
            $submitted_u_role = $request->input('submitted_u_role');

            for($j = 0; $j < count($user_id); $j++) {
                $contact->users()->attach($user_id[$j], ['role' => $submitted_u_role[$j]]);
            }
        }

        return redirect('/contacts')->with('success','Edited Successfully!');
    }
    
    public function destroy($id){

        $contact = Contact::findOrFail($id);
        if ($contact->delete()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'name' => $contact->name,
                'class' => 'Contact',
                'action' => 'Delete',
            ]);
        } else {
            return back()->withErrors('Deletion Failed!');
        }

        return redirect('/contacts')->with('success','Deleted!');
    }

    public function export() {
        return Excel::download(new ContactFromView, 'contacts.xlsx');
    }
}
