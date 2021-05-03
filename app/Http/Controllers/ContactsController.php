<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
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
        return view('contacts.create');
    }

    public function store()
    {
        $contact = New Contact();

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
        
        return view('contacts.edit',['contact'=>$contact]);
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

        return redirect('/contacts');
    }
    
    public function destroy($id){

        $contact = Contact::findOrFail($id);
        $contact->delete();

        
        return redirect('/contacts');
    }
}