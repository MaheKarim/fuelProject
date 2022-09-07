@extends('user.home')

@section('content')
 <h1 class="mt-4">LPG Delivery</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active" > Dashboard </li>
        <li class="breadcrumb-item active">LPG Delivery</li>
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
            LPG Delivery Form
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('user.lpgStore') }}">
            @csrf
                    <div class="form-group form-focus">
                        <label class="focus-label">Select LPG Name && Type</label>
                        <select name="cylinder_name_id" class="form-control select">
                            @php($lpgdeliveries= \App\LPGCylinder::all())
                            @foreach ($lpgdeliveries as $item)
                                <option value="{{ $item->id }}" {{ old('cylinder_name_id') == $item->id ? 'selected' : '' }}>{{$item->cylinder_name}}   --   {{ $item->cylinder_size }} Size Bottle   --   {{ $item->cylinder_price }}  BDT</option>
                            @endforeach
                        </select>
                    </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Delivery Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Delivery Address">
                </div>
                <div class="form-row">
                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Select Delivery Priority</label>
                        <select name="priority_name_id" class="form-control select">
                            @php($priorities = \App\Priority::all())
                            @foreach ($priorities as $priority )
                                <option value="{{ $priority->id }}" {{ old('priority_name_id') == $item->id ? 'selected' : '' }}>{{$priority->priority_name}} </option>
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
            <i class="fas fa-table ml-1"></i>
            LPG Delivery Sheet
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                <tr>

                    <th scope="col">LPG / Cylider Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Report</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $lpgDeliveries as $item)
                <tr>
                    <td>{{ $item->Cylinder->cylinder_name }} -   {{ $item->Cylinder->cylinder_size }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->Priority->priority_name }}</td>
                    <td> {{ date('d-m-Y', strtotime($item->created_at)) }} </td>
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
