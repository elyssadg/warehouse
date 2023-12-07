@extends('layout.template')

@section('title', 'Manage Warehouse')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Warehouse</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('warehouse.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="email-horizontal">Province</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="province">
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province }}">
                                                    {{ $province }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-4">
                                    <label for="contact-info-horizontal">City</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="contact-info-horizontal" class="form-control" name="city">
                                </div>
                                <div class="col-md-4">
                                    <label for="password-horizontal">Address</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="password-horizontal" class="form-control" name="address">
                                </div>
                                <div class="col-md-4">
                                    <label for="password-horizontal">Postal Code</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="password-horizontal" class="form-control" name="postalcode">
                                </div>
                                <x-alert-error />
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
