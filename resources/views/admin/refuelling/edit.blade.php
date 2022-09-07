@extends('admin.home')

@section('content')
    <h1 class="mt-4">Fuel Type</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Refuelling For</li>
        <li class="breadcrumb-item active">Refuelling Update</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            Update Form
        </div>
        <div class="card-body">
            <form action="{{ route('admin.refuelling.update', $refuellings->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Refuelling reason</label>
                    <input type="text" class="form-control"  id="refueling_reason" name="refueling_reason" value="{{ $refuellings->refueling_reason }}">
                    <input type="hidden" name="refueling_reason_id" value="{{ $refuellings->id }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
