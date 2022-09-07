@extends('admin.home')

@section('content')
    <h1 class="mt-4">Refuelling For</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item " > Dashboard </li>
        <li class="breadcrumb-item active">Refuelling For</li>
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
            Refuelling Table
            <a class="btn btn-success float-right" href="{{ route('admin.refuelling.create') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Add   Refuelling </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Refuelling For</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Refuelling For</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($refuellings as $refuelling)
                        <tr>
                            <td>{{ $refuelling->refueling_reason }}</td>
                            <td>{{ $refuelling->created_at->diffForHumans() }}</td>
                            <td>{{ $refuelling->updated_at->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.refuelling.edit', $refuelling->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.refuelling') }}"
                                   onclick="event.preventDefault();
                                       document.getElementById(
                                       'delete-form-{{$refuelling->id}}').submit();">Delete</a>
                            </td>
                            <form id="delete-form-{{$refuelling->id}}"
                                  + action="{{route('admin.refuelling.destroy', $refuelling->id)}}"
                                  method="post">
                                @csrf @method('DELETE')
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
