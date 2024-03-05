@extends('admin-layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Content Type List</h1>
        <a href="{{ route('contentType.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contentTypes as $contentType)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $contentType->name }}</td>
                    <td>
                        <a href="{{ route('contentType.edit', $contentType->id) }}" class="btn btn-sm btn-primary">edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $contentTypes->links('vendor.pagination.custome') }}
</div>
@endsection
