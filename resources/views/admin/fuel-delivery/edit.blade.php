@extends('admin.home')

@section('content')
    <h1 class="mt-4">Fuel Delivery</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item " > Dashboard </li>
        <li class="breadcrumb-item active">Update Fuel Delivery Request Service</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table ml-1"></i>
            Update Fuel Request Service

        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.fuelDeliveryUpdate', $delivery->id) }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Action</label>
                    <input type="text" class="form-control" name="isApproved" value="{{ $delivery->isApproved }}" placeholder="0 = Pending | 1 = Approved">
                    <input type="hidden" name="isApproved_id" value="{{ $delivery->id }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
