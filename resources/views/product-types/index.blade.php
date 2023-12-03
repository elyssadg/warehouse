@extends('layout.template')

@section('title', 'Manage Product Type')

@section('content')
    <section class="section">
        <div class="row" id="basic-table">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_types as $product_type)
                                        <tr>
                                            <td class="text-bold-500">{{ $product_type->product_type_id }}</td>
                                            <td class="text-bold-500">{{ $product_type->product_type_name }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info icon icon-left"><i
                                                        class="bi bi-info-circle"></i> <span
                                                        class="d-none d-lg-inline">Products</span></a>
                                                <a href="{{ route('product-types.edit', ['product_type' => $product_type->product_type_id]) }}"
                                                    class="btn btn-warning icon icon-left"><i
                                                        class="bi bi-pencil-square"></i> <span
                                                        class="d-none d-lg-inline">Edit</span></a>
                                                <a href="#" class="btn btn-danger icon icon-left"><i
                                                        class="bi bi-trash"></i> <span
                                                        class="d-none d-lg-inline">Delete</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $product_types->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
