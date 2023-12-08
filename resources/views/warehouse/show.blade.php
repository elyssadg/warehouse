@extends('layout.template')

@section('title', 'Manage Warehouse')

@section('custom-header')
    <link rel="stylesheet" href="/dist/assets/extensions/sweetalert2/sweetalert2.min.css">
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Warehouse Details</h4>
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
                            <div class="col-md-4">
                                <label for="email-horizontal">Created At</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse->created_at }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Updated At</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $warehouse->updated_at }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="card">
        <x-alert-success />
        <x-alert-error />
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Warehouse Items</h4>
            <form action="{{ route('warehouse-item.search', ['warehouse_id' => $warehouse->id]) }}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left">
                    <input type="text" class="form-control" name="product_name" placeholder="Search Product Name"
                        value="{{ isset($productName) ? $productName : old('product_name') }}">
                    <div class="form-control-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </form>
            <a href="{{ route('warehouse-item.create', ['warehouse_id' => $warehouse->id]) }}"
                class="btn btn-primary icon icon-left"><i class="bi bi-plus"></i>
                <span class="d-none d-lg-inline">New Item</span></a>
        </div>
        <div class="card-content">
            <!-- Table with no outer spacing -->
            <div class="table-responsive">
                <table class="table mb-0 table-lg">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Weight</th>
                            <th>Stock</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="text-bold-500">{{ $product->product->id }}</td>
                                <td class="text-bold-500">{{ $product->product->name }}</td>
                                <td class="text-bold-500">{{ $product->product->price }}</td>
                                <td class="text-bold-500">{{ $product->product->weight }} KG</td>
                                <td class="text-bold-500">{{ $product->stock }}</td>
                                <td class="text-bold-500">{{ $product->updated_at }}</td>
                                <td class="text-nowrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a class="me-3"
                                            href="{{ route('product.show', ['product' => $product->product->id]) }}"><i
                                                class="bi bi-info-circle" role="button"></i>
                                            <span class="d-none d-lg-inline">Details</span></a>
                                        @php
                                            $warehouse_item = $warehouse->id . ' ' . $product->product->id;
                                        @endphp
                                        <a class="me-3"
                                            href="{{ route('warehouse-item.retreiveView', ['warehouse_item' => $warehouse_item]) }}"><i
                                                class="bi bi-database-dash" role="button"></i>
                                            <span class="d-none d-lg-inline">Retreive</span></a>
                                        <a class="me-3"
                                            href="{{ route('warehouse-item.edit', ['warehouse_item' => $warehouse_item]) }}"><i
                                                class="bi bi-pencil-square" role="button"></i>
                                            <span class="d-none d-lg-inline">Edit</span></a>
                                        <a class="text-danger deleteButton" data-product-id="{{ $product->product->id }}"
                                            data-warehouse-id="{{ $warehouse->id }}" role="button"><i
                                                class="bi bi-trash"></i>
                                            <span class="d-none d-lg-inline">Delete</span></a>
                                        <form class="deleteForm" data-product-id="{{ $product->product->id }}"
                                            data-warehouse-id="{{ $warehouse->id }}"
                                            action="{{ route('warehouse-item.destroy', ['warehouse_item' => $warehouse_item]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script src="/dist/assets/extensions/sweetalert2/sweetalert2.min.js"></script>>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.deleteButton');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const warehouseId = this.getAttribute('data-warehouse-id');
                    const deleteForm = document.querySelector(
                        `form.deleteForm[data-product-id="${productId}"][data-warehouse-id="${warehouseId}"]`
                    );
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You won\'t be able to revert this!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteForm.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
