@extends('admin.home')

@section('content')
    <h1 class="mt-4">Fuel Delivery</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Fuel Delivery</li>
        <li class="breadcrumb-item active">Order Details</li>
    </ol>
    <div class="col-md-8">
        <div class="main-card card">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <tbody>
                    <tr>
                        <th scope="row">User Name:</th>
                        <td>{{ $delivery->user->name }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Order Phn Number</th>
                        <td>{{ $delivery->phn_number }}</td>
                    </tr>
                    <tr>
                        <th scope="row">User PHN Number</th>
                        <td>{{ $delivery->user->phn }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Order Product</th>
                        <td>{{ $delivery->Fuel->fuel_name }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Refuelling For</th>
                        <td>{{ $delivery->RefuellingName->refueling_reason }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Delivery Priority</th>
                        <td>
                        @if($delivery->priority_name_id == 3)
                                <button type="button" class="btn btn-group-sm btn-danger">{{ $delivery->Priority->priority_name }}</button>
                            @elseif($delivery->priority_name_id == 2)
                                <button type="button" class="btn btn-group-sm btn-warning">{{ $delivery->Priority->priority_name }}</button>
                            @else
                                <button type="button" class="btn btn-group-sm btn-info">{{ $delivery->Priority->priority_name }}</button>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Delivery Address</th>
                        <td>{{ $delivery->delivery_address }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Quantity</th>
                        <td>{{ $delivery->quantity }}/Ltr</td>
                    </tr>
                    <tr>
                        <th scope="row">Order Status</th>
                        <td> @if($delivery->isApproved == 0)
                                <button type="button" class="btn btn-group-sm btn-warning">Pending</button>
                            @else
                                <button type="button" class="btn btn-sm btn-success">Accept</button>
                            @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">Created At</th>
                        <td>{{ $delivery->created_at }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Updated At</th>
                        <td>{{ $delivery->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="form-group col-4 ">
                <a type="button" href="{{ route('admin.fueldelivery') }}"  class="btn btn-group-sm btn-primary ">Back</a>
            </div>

            <!-- /.card-body -->
        </div>
    </div>
@endsection
