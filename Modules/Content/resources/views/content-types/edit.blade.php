@extends('admin-layouts.app')
@section('content')
<div class="container">
    <h1>update Content Type</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('contentType.update',$contentType->id) }}">
                @method("put")
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $contentType->name ?? null }}" placeholder="Enter name" required>
                </div>
                <button type="submit" class="btn btn-primary">update</button>
            </form>
        </div>
    </div>
</div>

@endsection
