@extends('layout.template')

@section('title', 'Manage Product Type')

@section('content')
    <section class="section">
        <x-alert-success />
        <x-alert-error />
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Product Type</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST"
                        action="{{ route('product-type.update', ['product_type' => $productType->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">ID</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="product_type_id" class="form-control" name="product_type_id"
                                        placeholder="product_id" disabled value="{{ $productType->id }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="email-horizontal">Name</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="product_type_name" class="form-control"
                                        name="product_type_name" placeholder="product type name"
                                        value="{{ $productType->name }}">
                                </div>
                                <div class="col-sm-12 d-flex justify-content-between">
                                    <a href="{{ route('product-type.index') }}"
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
