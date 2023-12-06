@extends('layout.template')

@section('title', 'Manage Warehouse Item')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Warehouse</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="first-name-horizontal">ID</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse->id }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Province</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse->province }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">City</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse->city }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Address</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse->address }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Postal Code</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse->postalcode }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <x-alert-success />
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Warehouse Item</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST"
                        action="{{ route('warehouse-item.store', ['warehouse_id' => $warehouse->id]) }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="email-horizontal">Product</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    {{-- {{dd($products)}} --}}
                                    @if (sizeof($products) == 0)
                                        <label for="email-horizontal">There is no new item</label>
                                    @else
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="product">
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="email-horizontal">Stock </label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="Number" id="warehouse_item_stock" class="form-control"
                                        name="warehouse_item_stock" placeholder="item quantity"
                                        value="{{ old('warehouse_item_stock') }}" required>
                                </div>

                                <x-alert-error />

                                <div class="col-sm-12 d-flex justify-content-between">
                                    <a href="{{ route('warehouse.show', ['warehouse' => $warehouse->id]) }}"
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
