@extends('admin-layouts.app')
@section('content')
<div class="container">
    <h1>Create Content Type</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('content.store') }}">
                @csrf
                <div class="form-group">
                    <label for="text">Text</label>
                    <input type="text" class="form-control" id="text" name="text" placeholder="Enter text" >
                </div>

                <div class="form-group">
                    <label for="content_type">Content Type</label>
                    <select class="form-control" id="content_type" name="content_type_id" required>
                        <option value="" selected disabled>Select a content type</option>
                        @foreach($contentTypes as $contentType)
                            <option value="{{ $contentType->id }}" >{{ $contentType->name }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>

@endsection
