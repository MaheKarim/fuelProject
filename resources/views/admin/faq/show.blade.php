@extends('admin.home')

@section('content')
<h1 class="mt-4">FAQ </h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> Dashboard </li>
    <li class="breadcrumb-item active">FAQ Type</li>
</ol>

<!-- Notification Start Here -->
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<!-- Notification End Here -->
<!-- Notification Start Here -->
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<!-- Notification End Here -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table ml-1"></i>
                FAQ Table
                <a class="btn btn-success float-right" href="{{ route('admin.faq.create') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Add FAQ</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>FAQ Ques</th>
                                <th>FAQ Answer</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>FAQ Ques</th>
                                <th>FAQ Answer</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Details</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($fuels as $fuel)
                            <tr>
                                <td>{{ $fuel->ques }}</td>
                                <td>{{ $fuel->answer }}</td>
                                <td>{{ $fuel->created_at->diffForHumans() }}</td>
                                <td>{{ $fuel->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.faq.edit', $fuel->id) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.faq') }}"
                                    onclick="event.preventDefault();
                                     document.getElementById(
                                       'delete-form-{{$fuel->id}}').submit();">Delete</a>
                                </td>
                                <form id="delete-form-{{$fuel->id}}"
                                    + action="{{route('admin.faq.destroy', $fuel->id)}}"
                                    method="post">
                                  @csrf 
                                  @method('DELETE')
                              </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
