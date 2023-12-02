@extends('layout.template')

@section('title', 'Staff')

@section('custom-script')
    
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Staff List</h4>
            </div>
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
                                        <td class="text-bold-500">{{ $user->user_id }}</td>
                                        <td>{{ $user->user_name }}</td>
                                        <td>{{ $user->user_email }}</td>
                                        <td>{{ $user->user_address }}</td>
                                        <td>{{ $user->user_dob }}</td>
                                        <td>
                                            @forelse ($user->user_warehouse as $uw)
                                                <ul>
                                                    <li>{{ $uw->warehouse->warehouse_id - $uw->warehouse->warehouse_city - $uw->warehouse->warehouse_postalcode }}</li>
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

    <div class="card-body">
        <p>Change prev and next button into icon</p>
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-primary">
                <li class="page-item"><a class="page-link" href="#">
                        <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                    </a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">
                        <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                    </a></li>
            </ul>
        </nav>
    </div>
@endsection