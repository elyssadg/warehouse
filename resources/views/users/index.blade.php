@extends('layout.template')

@section('title', 'Manage User')

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
                    <h4 class="card-title">All User</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr style="color: #25396f">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>DOB</th>
                                    <th>Warehouse</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="text-nowrap">{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td class="text-nowrap">{{ $user->email }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td class="text-nowrap">{{ $user->dob->format('d F Y') }}</td>
                                        <td class="text-nowrap">
                                            @forelse ($user->user_warehouses as $uw)
                                                #{{ $uw->warehouse->id }}
                                                @if (!$loop->last)
                                                    , 
                                                @endif
                                            @empty
                                                No Warehouse Data
                                            @endforelse
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <button class="btn text-danger outline-none deleteButton" data-user-id="{{ $user->id }}">
                                                    <i class="bi bi-trash"></i>
                                                    <span>Delete</span>
                                                </button>
                                                <form class="deleteForm" data-user-id="{{ $user->id }}"
                                                    action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Staff Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
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
                    const userId = this.getAttribute('data-user-id');
                    const deleteForm = document.querySelector(
                        `.deleteForm[data-user-id="${userId}"]`);

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