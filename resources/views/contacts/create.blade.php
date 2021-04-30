@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <span class="card-title display-4">Add New Contact</span>
                {{ Form::open(['route' => 'contacts.store', 'files' => true]) }}
                <div class="form-row pt-3">
                    <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="nric">NRIC</label>
                    <input type="text" class="form-control" name="nric" placeholder="111111-11-1111" required>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="race">Race</label>
                    <input type="text" class="form-control" name="race" placeholder="Race" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                    <label for="contact_no">Mobile Phone</label>
                    <input type="text" class="form-control" name="contact_no" placeholder="011-11111111" required>
                    </div>
                    <div class="form-group col-md-3">
                    <label for="home_phone">Home Phone</label>
                    <input type="text" class="form-control" name="home_phone" placeholder="111-111111">
                    </div>
                    <div class="form-group col-md-3">
                    <label for="office_phone">Office phone</label>
                    <input type="text" class="form-control" name="office_phone" placeholder="111-111111">
                    </div>
                    <div class="form-group col-md-3">
                    <label for="fax_phone">Fax Phone</label>
                    <input type="text" class="form-control" name="fax_phone" placeholder="+60 (111) 111-1111">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="example@example.com" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="image">Image Upload</label>
                    <input type="file" class="form-control" name="image" accept="'image/*'">
                    </div>
                </div>
                <div class="form-group">
                    <label for="remark">Remark</label>
                    <textarea name="remark" class="form-control"></textarea>
                </div>
                <div class="float-right p-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection