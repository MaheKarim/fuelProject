@extends('admin.home')

@section('content')

<h1 class="mt-4">FAQ Type</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active" > Dashboard </li>
    <li class="breadcrumb-item active">FAQ </li>
    <li class="breadcrumb-item ">Create</li>
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
        Add FAQ Name

    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.faq.store') }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">FAQ Ques</label>
              <input type="text" class="form-control" name="ques" placeholder="Enter FAQ Ques">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">FAQ Answer</label>
              <input type="text" class="form-control" name="answer" placeholder="Enter FAQ Answer">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
