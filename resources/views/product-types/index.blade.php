@extends('layout.template')

@section('title', 'Manage Product Type')

@section('custom-header')
    <link rel="stylesheet" href="/dist/assets/extensions/sweetalert2/sweetalert2.min.css">
@endsection

@section('content')
    <section class="section">
        <x-alert-success />
        <x-alert-error />
        <div class="card">
            <div class="card-content">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">All Product Types</h4>
                    <a href="{{ route('product-type.create') }}" class="btn btn-primary icon icon-left"><i
                            class="bi bi-plus"></i> <span class="d-none d-lg-inline">New</span></a>
                </div>
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
                                @foreach ($productTypes as $productType)
                                    <tr>
                                        <td class="text-bold-500">{{ $productType->id }}</td>
                                        <td class="text-bold-500">{{ $productType->name }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info icon icon-left"><i
                                                    class="bi bi-info-circle"></i> <span
                                                    class="d-none d-lg-inline">Products</span></a>
                                            <a href="{{ route('product-type.edit', ['product_type' => $productType->id]) }}"
                                                class="btn btn-warning icon icon-left"><i class="bi bi-pencil-square"></i>
                                                <span class="d-none d-lg-inline">Edit</span></a>
                                            <button class="btn btn-danger icon icon-left deleteButton"
                                                data-product-type-id="{{ $productType->id }}"><i class="bi bi-trash"></i>
                                                <span class="d-none d-lg-inline">Delete</span></button>
                                            <form class="deleteForm" data-product-type-id="{{ $productType->id }}"
                                                action="{{ route('product-type.destroy', ['product_type' => $productType->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $productTypes->links() }}
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
                    const productId = this.getAttribute('data-product-type-id');
                    const deleteForm = document.querySelector(
                        `.deleteForm[data-product-type-id="${productId}"]`);

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
