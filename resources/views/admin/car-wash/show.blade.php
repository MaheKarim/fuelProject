@extends('admin.home')

@section('content')
    <h1 class="mt-4">CarWash For</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item " > Dashboard </li>
        <li class="breadcrumb-item active">CarWash </li>
    </ol>

    <!-- Notification Start Here -->
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <!-- Notification End Here -->
    <!-- Notification Start Here -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <!-- Notification End Here -->

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table ml-1"></i>
            Car Wash Table
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Car Model</th>
                        <th>Address</th>
                        <th>Delivery Date</th>
                        <th>Request By</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Car Model</th>
                        <th>Address</th>
                        <th>Delivery Date</th>
                        <th>Request By</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($refuellings as $refuelling)
                        <tr>
                            <td>{{ $refuelling->car_model }}</td>
                            <td>{{ $refuelling->address }}</td>
                            <td>{{ $refuelling->date }}</td>
                            <td>{{ $refuelling->user->name }}</td>                                
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
