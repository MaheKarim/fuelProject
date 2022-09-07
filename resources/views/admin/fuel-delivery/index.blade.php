@extends('admin.home')

@section('content')
    <h1 class="mt-4">Fuel Delivery</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item " > Dashboard </li>
        <li class="breadcrumb-item active">Fuel Delivery</li>
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
            Fuel Delivery Table
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Fuel Name</th>
                        <th>Booking Date</th>
                        <th>Delivery Priority</th>
                        <th>isApproved</th>
                        <th>Created At</th>
                        <th>Details</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($delivery as $item)
                        <tr>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->Fuel->fuel_name }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->booking_date)) }}</td>
                            <td>{{ $item->Priority->priority_name }}</td>
                            <td>
                                @if($item->isApproved == 0)
                                    <button type="button" class="btn btn-warning">Pending</button>
                                @else
                                    <button type="button" class="btn btn-success">Accept</button>
                                @endif
                            </td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('admin.delivery.details', $item->id) }}">Details</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.deliveryEdit', $item->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.fueldelivery') }}"
                                   onclick="event.preventDefault();
                                       document.getElementById(
                                       'delete-form-{{$item->id}}').submit();">Delete</a>
                            </td>
                            <form id="delete-form-{{$item->id}}"
                                  + action="{{route('admin.deliveryDestroy', $item->id)}}"
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
