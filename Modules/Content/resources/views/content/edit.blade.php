@extends('admin-layouts.app')
@section('content')
<div class="container">
    <h1>update Content Type</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('content.update',$content->id) }}">
                @method("put")
                @csrf
                <div class="form-group">
                    <label for="text">Text</label>
                    <input type="text" class="form-control" id="text" name="text" value="{{ $content->text ?? null }}" placeholder="Enter text" required>
                </div>

                <div class="form-group">
                    <label for="content_type">Content Type</label>
                    <select class="form-control" id="content_type" name="content_type_id" required>
                        <option value="" selected disabled>Select a content type</option>
                        @foreach($contentTypes as $contentType)
                            <option value="{{ $contentType->id }}" {{ (isset($content) && $content->content_type_id === $contentType->id) ? 'selected' : '' }}>{{ $contentType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">update</button>
            </form>
        </div>
    </div>
</div>

@endsection
