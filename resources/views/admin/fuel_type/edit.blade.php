@extends('admin.home')

@section('content')
    <h1 class="mt-4">Fuel Type</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item " > Dashboard </li>
        <li class="breadcrumb-item ">Fuel Type</li>
        <li class="breadcrumb-item active">Fuel Type Update</li>
    </ol>

    <div class="card mb-4">
       <div class="card-header">
           Update Form
       </div>
        <div class="card-body">
            <form action="{{ route('admin.fuelTypeUpdate',$fuels->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Fuel Type Name</label>
                    <input type="text" class="form-control"  id="fuel_name" name="fuel_name" value="{{ $fuels->fuel_name }}">
                    <input type="hidden" name="fuel_name_id" value="{{ $fuels->id }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
