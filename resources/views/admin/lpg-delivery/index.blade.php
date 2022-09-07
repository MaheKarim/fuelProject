@extends('admin.home')

@section('content')
<h1 class="mt-4">LPG Delivery</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item " > Dashboard </li>
    <li class="breadcrumb-item active">LPG Delivery All</li>
</ol>

<!-- Notification Start Here -->
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@elseif (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<!-- Notification End Here -->

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table ml-1"></i>
                LPG Delivery Table
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cylinder Name</th>
                                <th>User</th>
                                <th>Address</th>
                                <th>PHN</th>
                                <th>Priority At</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Cylinder Name</th>
                                <th>User</th>
                                <th>Address</th>
                                <th>PHN</th>
                                <th>Priority </th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($lpgDeliveries as $item)
                            <tr>
                                <td>{{  $item->id+1 }}</td>
                                <td>{{ $item->Cylinder->cylinder_name }} --  {{ $item->Cylinder->cylinder_size }}</td>
                                <td>{{ $item->User->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->User->phn }}</td>
                                <td>{{ $item->Priority->priority_name }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.lpg') }}"
                                    onclick="event.preventDefault();
                                     document.getElementById(
                                       'delete-form-{{$item->id}}').submit();">Delete</a>
                                </td>
                                <form id="delete-form-{{$item->id}}"
                                    + action="{{route('admin.lpg.destroy', $item->id)}}"
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
