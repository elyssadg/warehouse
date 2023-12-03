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
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>DOB</th>
                                    <th>Warehouse</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->user_id }}</td>
                                        <td>{{ $user->user_name }}</td>
                                        <td>{{ $user->user_email }}</td>
                                        <td>{{ $user->user_address }}</td>
                                        <td>{{ $user->user_dob->format('d F Y') }}</td>
                                        <td>
                                            @forelse ($user->user_warehouses as $uw)
                                                <ul>
                                                    <li>Warehouse #{{ $uw->warehouse->warehouse_id }}</li>
                                                </ul>
                                            @empty
                                                No Warehouse Data
                                            @endforelse
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
    
    <div class="card-body d-flex align-items-center justify-content-center">
        {{ $users->onEachSide(1)->links('pagination.custom') }}
    </div>
@endsection