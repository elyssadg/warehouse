@extends('layout.template')

@section('title', 'Account Security')

@section('content')
    <section class="section">
        <x-alert-error />
        <x-alert-success />
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('account.update', ['account' => $user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="type" value="password">
                            <div class="form-group my-2">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-control" placeholder="Enter your current password">
                            </div>
                            <div class="form-group my-2">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="New Password" value="">
                            </div>
                            <div class="form-group my-2">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Confirm Password" value="">
                            </div>

                            <div class="form-group my-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Delete Account</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('account.destroy', ['account' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <p>Your account will be permanently deleted and cannot be restored, click "Touch me!" to continue</p>
                            <div class="form-check">
                                <div class="checkbox">
                                    <input type="checkbox" id="agreement" class="form-check-input" name="agreement">
                                    <label for="agreement">Touch me! If you agree to delete permanently</label>
                                </div>
                            </div>
                            <div class="form-group my-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger" id="btn-delete-account">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection