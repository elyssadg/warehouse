@extends('layout.template')

@section('title', 'Manage Products')

@section('custom-header')
    <link rel="stylesheet" href="/dist/assets/extensions/sweetalert2/sweetalert2.min.css">
@endsection

@section('content')
    <section class="section">
        <x-alert-success />
        <x-alert-error />
        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <h4 class="card-title">All Products</h4>
                </div>
                <div class="card-body">
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Weight</th>
                                    <th>Price</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-bold-500">{{ $product->id }}</td>
                                        <td class="text-bold-500 text-nowrap">{{ $product->name }}</td>
                                        <td class="text-nowrap">{{ $product->product_type->name }}</td>
                                        <td>{{ $product->weight }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td class="text-nowrap">{{ $product->updated_at }}</td>
                                        <td class="text-nowrap">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="me-3"
                                                    href="{{ route('product.show', ['product' => $product->id]) }}"><i
                                                        class="bi bi-info-circle" role="button"></i>
                                                    <span class="d-none d-lg-inline">details</span></a>
                                                <a class="me-3"
                                                    href="{{ route('product.edit', ['product' => $product->id]) }}"><i
                                                        class="bi bi-pencil-square" role="button"></i>
                                                    <span class="d-none d-lg-inline">edit</span></a>
                                                <a class="text-danger deleteButton" data-product-id="{{ $product->id }}"
                                                    role="button"><i class="bi bi-trash"></i>
                                                    <span class="d-none d-lg-inline">delete</span></a>
                                                <form class="deleteForm" data-product-id="{{ $product->id }}"
                                                    action="{{ route('product.destroy', ['product' => $product->id]) }}"
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
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-script')
    <script src="/dist/assets/extensions/sweetalert2/sweetalert2.min.js"></script>>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.deleteButton');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const deleteForm = document.querySelector(
                        `.deleteForm[data-product-id="${productId}"]`);

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
