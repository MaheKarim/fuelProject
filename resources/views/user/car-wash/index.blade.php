@extends('user.home')

@section('content')
 <h1 class="mt-4">Car Wash</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active" > Dashboard </li>
        <li class="breadcrumb-item active">Car Wash</li>
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
            Car Wash Delivery Form
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('user.washStore') }}">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Car Model</label>
                    <input type="text" class="form-control" name="car_model" placeholder="Car Model">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Delivery Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Car Address">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" class="form-control" name="date">
                </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table ml-1"></i>
            Car Wash
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                <tr>

                    <th scope="col">Car Model</th>
                    <th scope="col">Address</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Report</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $lpgDeliveries as $item)
                <tr>
                    <td>{{ $item->car_model }} </td>
                    <td>{{ $item->address }}</td>
                    <td> {{ date('d-m-Y', strtotime($item->date)) }} </td>
                    <td>
                      <button type="button" class="btn btn-warning">Pending</button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
