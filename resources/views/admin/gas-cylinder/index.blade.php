@extends('admin.home')

@section('content')
    <h1 class="mt-4">LPG Cylinder</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active" > Dashboard </li>
        <li class="breadcrumb-item ">LPG Cylinder</li>
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
            Add LPG Cylinder Sheet
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.gasCylinder.store') }}">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Company Name</label>
                    <input type="text" class="form-control" name="cylinder_name" placeholder="JAMUNA GAS">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phn">Size</label>
                        <input type="text" class="form-control" name="cylinder_size" placeholder=" Small or Big">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phn">Stock</label>
                        <input type="text" class="form-control" name="cylinder_stock" placeholder="18">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phn">Price</label>
                        <input type="text" class="form-control" name="cylinder_price" placeholder="790">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- Show LPG Data -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table ml-1"></i>
            Show LPG Cylinder Data
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">GAS Name</th>
                    <th scope="col">Size</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($gases as $gas)
                <tr>
                    <td>{{ $gas->cylinder_name }}</td>
                    <td>{{ $gas->cylinder_size }}</td>
                    <td>{{ $gas->cylinder_stock }}</td>
                    <td>{{ $gas->cylinder_price }}</td>
                    <td>
                        <a type="button" class="btn btn-primary" href="{{ route('admin.gasCylinder.edit', $gas->id) }}">Edit</a>

                        <a type="button" class="btn btn-info" href="{{ route('admin.gasCylinderService') }}" onclick="event.preventDefault();
                            document.getElementById(
                            'delete-form-{{$gas->id}}').submit();">Delete</a>
                    </td>
                    <form id="delete-form-{{$gas->id}}"
                          + action="{{route('admin.gasCylinder.delete', $gas->id)}}"
                          method="post">
                        @csrf @method('DELETE')
                    </form>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
