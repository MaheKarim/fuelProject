@extends('admin.home')

@section('content')
    <h1 class="mt-4">Priority Setup</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item ">Dashboard </li>
        <li class="breadcrumb-item active">Priority</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table ml-1"></i>
            Priority Table
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Priority Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Fuel Type</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($priorities as $item)
                        <tr>
                            <td>{{ $item->priority_name }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>{{ $item->updated_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
