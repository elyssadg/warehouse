@extends('layout.template')

@section('title', 'Manage User')

@section('content')
    <section class="section">
        <x-alert-error />
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New User</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST"
                        action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="user_name">Name</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="user_name" class="form-control"
                                        name="user_name" placeholder="User Name">
                                </div>
                                <div class="col-md-4">
                                    <label for="user_email">Email</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="email" id="user_email" class="form-control"
                                        name="user_email" placeholder="User Email"> 
                                </div>
                                <div class="col-md-4">
                                    <label for="user_password">Password</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="password" id="user_password" class="form-control"
                                        name="user_password" placeholder="User Password"> 
                                </div>
                                <div class="col-md-4">
                                    <label for="user_password_confirmation">Confirm Password</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="password" id="user_password_confirmation" class="form-control"
                                        name="user_password_confirmation" placeholder="Confirm User Password"> 
                                </div>
                                <div class="col-md-4">
                                    <label for="user_role">Role</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="form-select" id="user_role" name="user_role">
                                        <option selected value="" disabled>Select User Role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="user_address">Address</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="user_address" class="form-control"
                                        name="user_address" placeholder="User Address">
                                </div>
                                <div class="col-md-4">
                                    <label for="user_dob">Date of Birth</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="date" id="user_dob" class="form-control flatpickr-no-config"
                                        name="user_dob" placeholder="User Date of Birth">
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection