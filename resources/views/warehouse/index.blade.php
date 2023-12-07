@extends('layout.template')

@section('title', 'Manage Warehouse')

@section('custom-header')
    <link rel="stylesheet" href="/dist/assets/extensions/sweetalert2/sweetalert2.min.css">
@endsection

@section('content')
    <section class="section">
        <x-alert-success />
        <x-alert-error />
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    All Warehouses
                </h5>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Province</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>Postal Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warehouses as $warehouse)
                                        <tr>
                                            <td>{{ $warehouse->id }}</td>
                                            <td>{{ $warehouse->province }}</td>
                                            <td>{{ $warehouse->city }}</td>
                                            <td>{{ $warehouse->address }}</td>
                                            <td>{{ $warehouse->postalcode }}</td>
                                            <td class="text-nowrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a class="me-3"
                                                        href="{{ route('warehouse.show', ['warehouse' => $warehouse->id]) }}"><i
                                                            class="bi bi-info-circle" role="button"></i>
                                                        <span class="d-none d-lg-inline">Details</span></a>
                                                    <a class="me-3"
                                                        href="{{ route('warehouse.edit', ['warehouse' => $warehouse->id]) }}"><i
                                                            class="bi bi-pencil-square" role="button"></i>
                                                        <span class="d-none d-lg-inline">Edit</span></a>
                                                    @if (Auth::user() && Auth::user()->role == 'Admin')
                                                        <a class="text-danger deleteButton"
                                                            data-warehouse-id="{{ $warehouse->id }}" role="button"><i
                                                                class="bi bi-trash"></i>
                                                            <span class="d-none d-lg-inline">Delete</span></a>
                                                        <form class="deleteForm" data-warehouse-id="{{ $warehouse->id }}"
                                                            action="{{ route('warehouse.destroy', ['warehouse' => $warehouse->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $warehouses->links() }}
                        </div>
                    </div>
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
                    const warehouseId = this.getAttribute('data-warehouse-id');
                    const deleteForm = document.querySelector(
                        `.deleteForm[data-warehouse-id="${warehouseId}"]`);
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
