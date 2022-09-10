@extends('admin.home')

@section('content')
    <h1 class="mt-4">Feedback</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Feedback</li>
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
            Feedback Table
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Feedback</th>
                        <th>User Name</th>
                        <th>Created At </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Feedback</th>
                        <th>User Name</th>
                        <th>Created At </th> 
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($refuellings as $refuelling)
                        <tr>
                            <td>{{ $refuelling->feedback }}</td>
                            <td>{{ $refuelling->user->name }}</td>
                            <td>{{ $refuelling->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
