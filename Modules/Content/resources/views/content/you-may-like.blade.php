@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if ($contents->count() > 0)
                    <ul>
                        @foreach ($contents as $contentType)
                        <li>Content Type: {{ $contentType->name }}</li>
                        <ul>
                            @forelse ($contentType->contents as $content)
                            <div class="card mb-3" data-content-id="{{ $content->id }}">
                                <div class="card-body">
                                    <p class="card-text">{{ $content->text }}</p>
                                    @if (auth()->check())
                                    @php
                                    $userLiked = auth()->user()->likes->where('content_id',$content->id)->count();
                                    @endphp
                                    <button class="btn btn-primary like-button"
                                        style="{{ $userLiked ? 'display:none;' : '' }}">Like</button>
                                    <button class="btn btn-secondary unlike-button"
                                        style="{{ $userLiked ? '' : 'display:none;' }}">Unlike</button>
                                    @else
                                    <button class="btn btn-primary like-button">Like</button>
                                    <button class="btn btn-secondary unlike-button"
                                        style="display:none;">Unlike</button>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <li>No contents available for this content type.</li>
                            @endforelse
                        </ul>
                        @endforeach
                    </ul>
                    @else
                    <p>No content types with liked contents available.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    {{ $contents->links('vendor.pagination.custome') }}
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.like-button, .unlike-button').on('click', function() {
            var contentId = $(this).closest('.card').data('content-id');
            var isLikeButton = $(this).hasClass('like-button');
            var likeButton = $(this).siblings('.like-button');
            var unlikeButton = $(this).siblings('.unlike-button');
            var likeCount = $(this).siblings('.like-count');

            $.ajax({
                type: 'PUT',
                url: '/interact/' + contentId,
                data: {
                    _token: '{{ csrf_token() }}',
                    like: isLikeButton ? 1 : 0, // 1 for like, 0 for unlike
                },
                success: function(data) {
                    if (isLikeButton) {
                        likeButton.hide();
                        unlikeButton.show();
                    } else {
                        likeButton.show();
                        unlikeButton.hide();
                    }
                    likeCount.text(data.likes);
                }
            });
        });
    });
</script>
@endsection


