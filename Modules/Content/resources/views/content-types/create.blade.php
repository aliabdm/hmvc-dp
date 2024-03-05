@extends('admin-layouts.app')
@section('content')
<div class="container">
    <h1>Create Content Type</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('contentType.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" >
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>

@endsection
