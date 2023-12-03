@extends('layout.template')

@section('title', 'Manage Products')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product Details</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="first-name-horizontal">ID</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $product->id }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Name</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $product->name }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Type</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $product->product_type->name }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Weight</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $product->weight }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Price</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $product->price }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Updated At</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $product->updated_at }}
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal">Created At</label>
                            </div>
                            <div class="col-md-8 mb-2">
                                {{ $product->created_at }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Warehouse</h4>
            </div>
            <div class="card-content">
                <div class="card-body">

                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Warehouse ID</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($warehouse_items as $item)
                                    <tr>
                                        <td class="text-bold-500">Warehouse #{{ $item->warehouse_id }}</td>
                                        <td class="text-bold-500 text-nowrap">{{ $item->stock }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $warehouse_items->links() }}
                    <div class="col-sm-12 d-flex justify-content-between">
                        <a href="{{ route('product.index') }}" class="btn btn-light-secondary me-1 mb-1">Back</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
