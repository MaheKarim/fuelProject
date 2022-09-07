@extends('admin.home')

@section('content')
    <h1 class="mt-4">FAQ Type</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item " > Dashboard </li>
        <li class="breadcrumb-item ">FAQ Type</li>
        <li class="breadcrumb-item active">FAQ Type Update</li>
    </ol>

    <div class="card mb-4">
       <div class="card-header">
           Update Form
       </div>
        <div class="card-body">
            <form action="{{ route('admin.faqUpdate',$fuels->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="ques">FAQ Ques</label>
                    <input type="text" class="form-control"  id="ques" name="ques" value="{{ $fuels->ques }}">
                    <input type="hidden" name="ques_id" value="{{ $fuels->id }}">
                </div>
                <div class="form-group">
                    <label for="answer">FAQ Answer</label>
                    <input type="text" class="form-control"  id="answer" name="answer" value="{{ $fuels->answer }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
