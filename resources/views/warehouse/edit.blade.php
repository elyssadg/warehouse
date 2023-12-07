@extends('layout.template')

@section('title', 'Manage Warehouse Item')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Warehouse</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" id="updateForm"
                        action="{{ route('warehouse.update', ['warehouse' => $warehouse->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">ID</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p class="form-control-static" id="staticInput">{{ $warehouse->id }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="email-horizontal">Province</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="province">
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province }}"
                                                    {{ $warehouse->province == $province ? 'selected' : '' }}>
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
                                    <input type="text" id="contact-info-horizontal" class="form-control" name="city"
                                        value="{{ $warehouse->city }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="password-horizontal">Address</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="password-horizontal" class="form-control" name="address"
                                        value="{{ $warehouse->address }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="password-horizontal">Postal Code</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="password-horizontal" class="form-control" name="postalcode"
                                        value="{{ $warehouse->postalcode }}">
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

@section('custom-script')
    <script>
        function resetForm() {
            document.getElementById("updateForm").reset();
        }
    </script>
@endsection
