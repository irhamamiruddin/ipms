<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;
use App\Models\User;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function store()
    {
        $contacts = New Contact();

        $contacts->name = request('name');
        $contacts->nric = request('nric');
        $contacts->race = request('race');
        $contacts->address = request('address');
        $contacts->contact_no = request('contact_no');
        $contacts->home_phone = request('home_phone');
        $contacts->office_phone = request('office_phone');
        $contacts->fax_phone = request('fax_phone');
        $contacts->email = request('email');
        $contacts->image = request('image');
        $contacts->remark = request('remark');

        $contacts->save();
        

        $contact = Contact::find($contacts->id);

        if (request('company_id') != NULL) {
            $company_id = request('company_id');
            $submitted_c_role = request('submitted_c_role');

            for($i = 0; $i < count($company_id); $i++) {
                $contact->companies()->attach($company_id[$i], ['role' => $submitted_c_role[$i]]);
            }
        }

        if (request('user_id') != NULL) {
            $user_id = request('user_id');
            $submitted_u_role = request('submitted_u_role');
            
            for($j = 0; $j < count($user_id); $j++) {
                $contact->users()->attach($user_id[$j], ['role' => $submitted_u_role[$j]]);
            }
        }

        return redirect('/contacts');
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

    public function update()
    {
        $id = request('id');

        $contact = Contact::findOrFail($id);

        $contact->name = request('name');
        $contact->nric = request('nric');
        $contact->race = request('race');
        $contact->address = request('address');
        $contact->contact_no = request('contact_no');
        $contact->home_phone = request('home_phone');
        $contact->office_phone = request('office_phone');
        $contact->fax_phone = request('fax_phone');
        $contact->email = request('email');
        $contact->image = request('image');
        $contact->remark = request('remark');

        $contact->save();

        if (request('company_id') != NULL) {
            $company_id = request('company_id');
            $submitted_c_role = request('submitted_c_role');

            for($i = 0; $i < count($company_id); $i++) {
                $contact->companies()->attach($company_id[$i], ['role' => $submitted_c_role[$i]]);
            }
        }

        if (request('user_id') != NULL) {
            $user_id = request('user_id');
            $submitted_u_role = request('submitted_u_role');
            
            for($j = 0; $j < count($user_id); $j++) {
                $contact->users()->attach($user_id[$j], ['role' => $submitted_u_role[$j]]);
            }
        }

        return redirect('/contacts');
    }
    
    public function destroy($id){

        $contact = Contact::findOrFail($id);
        $contact->delete();

        
        return redirect('/contacts');
    }
}
