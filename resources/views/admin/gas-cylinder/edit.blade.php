@extends('admin.home')

@section('content')
    <h1 class="mt-4">LPG Cylinder</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active" > Dashboard </li>
        <li class="breadcrumb-item active">LPG Cylinder</li>
        <li class="breadcrumb-item ">LPG Cylinder Update</li>
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
            Update LPG Cylinder Sheet
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.gasCylinder.update', $gases->id) }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Company Name</label>
                    <input type="text" class="form-control" name="cylinder_name" placeholder="Jamuna GAS" value="{{ $gases->cylinder_name }}">
                    <input type="hidden" name="cylinder_name_id">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phn">Size</label>
                        <input type="text" class="form-control" name="cylinder_size" placeholder=" Small or Big" value="{{ $gases->cylinder_size }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phn">Stock</label>
                        <input type="text" class="form-control" name="cylinder_stock" placeholder="18" value="{{ $gases->cylinder_stock }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phn">Price</label>
                        <input type="text" class="form-control" name="cylinder_price" placeholder="790"  value="{{ $gases->cylinder_price }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>

@endsection
