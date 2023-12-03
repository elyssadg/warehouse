@extends('layout.template')

@section('title', 'Staff List')

@section('custom-script')
    
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-content">
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
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->dob->format('d F Y') }}</td>
                                        <td>
                                            @forelse ($user->user_warehouses as $uw)
                                                <ul>
                                                    <li>Warehouse #{{ $uw->warehouse->id }}</li>
                                                </ul>
                                            @empty
                                                No Warehouse Data
                                            @endforelse
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="">
                                                    <i class="bi bi-trash"></i>
                                                </a>
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
                </div>
            </div>
        </div>
    </section>
    
    <div class="card-body d-flex align-items-center justify-content-end">
        {{ $users->onEachSide(1)->links('pagination.custom') }}
    </div>
@endsection