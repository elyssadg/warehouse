@extends('layout.template')

@section('title', 'Manage User')

@section('content')
    <section class="section">
        <x-alert-error />
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit User</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST"
                        action="{{ route('users.update', ['user' => $user->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="user_id">ID</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="user_id" class="form-control" name="user_id"
                                        placeholder="User ID" disabled value="{{ $user->id }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="user_name">Name</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="user_name" class="form-control"
                                        name="user_name" placeholder="User Name" value="{{ $user->name }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="user_email">Email</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="email" id="user_email" class="form-control"
                                        name="user_email" placeholder="User Email" disabled value="{{ $user->email }}"> 
                                </div>
                                <div class="col-md-4">
                                    <label for="user_role">Role</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="form-select" id="user_role" name="user_role">
                                        <option value="Admin">Admin</option>
                                        <option value="Staff" selected>Staff</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="user_address">Address</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="user_address" class="form-control"
                                        name="user_address" placeholder="User Address" value="{{ $user->address }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="user_dob">Date of Birth</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="date" id="user_dob" class="form-control flatpickr-no-config"
                                        name="user_dob" placeholder="User Date of Birth" value="{{ $user->dob->format('Y-m-d') }}">
                                </div>
                                <div class="col-sm-12 d-flex justify-content-between">
                                    <a href="{{ route('users.index') }}"
                                        class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection