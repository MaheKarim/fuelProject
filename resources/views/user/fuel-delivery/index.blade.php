@extends('user.home')

@section('content')

    <h1 class="mt-4">Fuel Delivery</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active" > Dashboard </li>
        <li class="breadcrumb-item active">Fuel Delivery</li>
    </ol>
    <!-- error message -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- error message end -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table ml-1"></i>
            Add Delivery Sheet
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('user.fuelDelivery.store') }}">
                @csrf
                    <!-- Area Start -->
                    <div class="form-row">
                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Select Fuel Type</label>
                        <select name="fuel_name_id" class="form-control select">
                            @php($fuels= \App\FuelType::all())
                            @foreach ($fuels as $fuel)
                                <option value="{{ $fuel->id }}" {{ old('fuel_name_id') == $fuel->id ? 'selected' : '' }}>{{$fuel->fuel_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Area END -->
                    <!-- Area Start -->
                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Refueling For</label>
                        <select name="refueling_for_id" class="form-control select">
                            @php($refuellings= \App\RefuelingFor::all())
                            @foreach ($refuellings as $refuelling)
                                <option value="{{ $refuelling->id }}" {{ old('refueling_for_id') == $refuelling->id ? 'selected' : '' }}>{{$refuelling->refueling_reason}}</option>
                            @endforeach
                        </select>
                    </div>

                    </div>
                    <!-- Area END -->

                    <div class="form-group">
                        <label for="exampleInputEmail1">Delivery Address</label>
                        <input type="text" class="form-control" name="delivery_address" placeholder="Delivery Address">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Date Time</label>
                            <input type="datetime-local" class="form-control" name="booking_date">
                        </div>
                    <div class="form-group col-md-4">
                        <label for="phn">PHN Number</label>
                        <input type="number" class="form-control" name="phn_number" placeholder="PHN Number ex: 01303062727 ">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phn">Quantity (Litre/L)</label>
                        <input type="number" class="form-control" name="quantity" placeholder=" 10 (minimum 5 Ltr.)">
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="SetDelivery">Set Delivery Signal</label>
                            <select name="priority_name_id" class="form-control select">
                                @php($priorities = \App\Priority::all())
                                @foreach ($priorities as $priority)
                                    <option value="{{ $priority->id }}" {{ old('priority_name_id') == $priority->id ? 'selected' : '' }}>{{$priority->priority_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    <div class="card mb-4">
        <div class="card-header">
           Report For Fuel Delivery
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fuel Type</th>
                    <th scope="col">Refuelling For</th>
                    <th scope="col">Delivery Address</th>
                    <th scope="col">Date</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Report</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $deliveries as $deliver)
                <tr>
                    <th scope="row">{{ $deliver->id }}</th>
                    <td>{{ $deliver->Fuel->fuel_name }}</td>
                    <td>{{ $deliver->RefuellingName->refueling_reason	 }}</td>
                    <td>{{ $deliver->delivery_address }}</td>
                    <td> {{ date('d-m-Y', strtotime($deliver->booking_date)) }} </td>
                    <td>{{ $deliver->quantity }}</td>
                    <td>
                        @if($deliver->isApproved == 0)
                            <button type="button" class="btn btn-warning">Pending</button>
                        @else
                            <button type="button" class="btn btn-success">Accept</button>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
