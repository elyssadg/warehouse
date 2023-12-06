@extends('layout.template')

@section('title', 'Manage Warehouse Item')

@section('content')
    @php
        $ids = $warehouse_item->warehouse_id . ' ' . $warehouse_item->product_id;
    @endphp

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
                                {{ $warehouse_item->warehouse->id }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Province</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse_item->warehouse->province }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">City</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse_item->warehouse->city }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Address</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse_item->warehouse->address }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Postal Code</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse_item->warehouse->postalcode }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Update Warehouse Item</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" id="updateForm"
                    action="{{ route('warehouse-item.update', ['warehouse_item' => $ids]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Product ID</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse_item->product->id }}
                            </div>

                            <div class="col-md-4">
                                <label for="email-horizontal">Product Name</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse_item->product->name }}
                            </div>

                            <div class="col-md-4">
                                <label for="email-horizontal">Product Type</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse_item->product->product_type->name }}
                            </div>

                            <div class="col-md-4">
                                <label for="first-name-horizontal">Stock</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="number" id="first-name-horizontal" class="form-control" name="stock"
                                    value="{{ $warehouse_item->stock }}">
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
@endsection

@section('custom-script')
    <script>
        function resetForm() {
            document.getElementById("updateForm").reset();
        }
    </script>
@endsection
