@extends('admin-layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Content Type List</h1>
        <a href="{{ route('content.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Content</th>
                    <th>Content Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $content)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $content->text }}</td>
                    <td>{{ $content->contentType->name }}</td>
                    <td>
                        <a href="{{ route('content.edit',$content->id) }}" class="btn btn-sm btn-primary">edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $contents->links('vendor.pagination.custome') }}
</div>
@endsection
