@extends('layout.template')

@section('title', 'Manage Product Type')

@section('content')
    <section class="section">
        <x-alert-success />
        <x-alert-error />
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Product Type</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{ route('product-types.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="email-horizontal">Name</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="product_type_name" class="form-control"
                                        name="product_type_name" placeholder="product type name"
                                        value="{{ old('product_type_name') }}">
                                </div>
                                <div class="col-sm-12 d-flex justify-content-between">
                                    <a href="{{ route('product-types.index') }}"
                                        class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Insert</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
