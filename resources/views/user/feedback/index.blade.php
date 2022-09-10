@extends('user.home')

@section('content')
 <h1 class="mt-4">Feedback</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active" > Dashboard </li>
        <li class="breadcrumb-item active">Feedback </li>
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
            Feedback Form
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('user.feedback.store') }}">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Feedback</label>
                    <input type="text" class="form-control" name="feedback" placeholder="Feedback">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table ml-1"></i>
            Feedback
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Feedback</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $lpgDeliveries as $item)
                <tr>
                    <td>{{ $item->feedback }} </td>
                    
                    <td>
                        {{ $item->created_at }}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
