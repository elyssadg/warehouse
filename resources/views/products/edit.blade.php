@extends('layout.template')

@section('title', 'Manage Products')

@section('content')
    <section class="section">
        <x-alert-success />
        <x-alert-error />
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Product</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST"
                        action="{{ route('product.update', ['product' => $product->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">ID</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="product_id" class="form-control" name="product_id"
                                        placeholder="product id" disabled value="{{ $product->id }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="email-horizontal">Name</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="product_name" class="form-control" name="product_name"
                                        placeholder="product name" value="{{ $product->name }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="email-horizontal">Type</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <fieldset>
                                        <select class="form-select" id="product_type" name="product_type">
                                            @foreach ($productTypes as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ $product->product_type_id == $type->id ? 'selected' : '' }}>
                                                    {{ $type->id }} -
                                                    {{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-4">
                                    <label for="email-horizontal">Weight</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="number" id="product_weight" class="form-control" name="product_weight"
                                        placeholder="product weight" value="{{ $product->weight }}" step=0.0000001>
                                </div>
                                <div class="col-md-4">
                                    <label for="email-horizontal">Price</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="number" id="product_price" class="form-control" name="product_price"
                                        placeholder="product weight" value="{{ $product->price }}" step="1"
                                        min="0">
                                </div>
                                <div class="col-sm-12 d-flex justify-content-between">
                                    <a href="{{ route('product.index') }}"
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
