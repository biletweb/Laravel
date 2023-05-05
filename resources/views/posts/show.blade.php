@extends('layouts.main')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-info text-center mb-4">{{ __(session()->get('message')) }}</div>
    @endif
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <small class="text-body-secondary rounded float-start">{{ __('Category') }}: Природа</small>
                </div>
                {{--                <div class="d-grid gap-2 d-md-flex justify-content-md-end">--}}
                {{--                    <a class="text-body-secondary me-2" href="#" title="{{ __('Like') }}">--}}
                {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">--}}
                {{--                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>--}}
                {{--                        </svg>--}}
                {{--                    </a>--}}
                {{--                    <a class="text-body-secondary me-2" href="#" title="{{ __('Dislike') }}">--}}
                {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">--}}
                {{--                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>--}}
                {{--                        </svg>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            </div>
            <hr>
            <h2 class="fw-bold">{{ $post->title }}</h2>
            <p class="col-md-12 fs-4">{{ $post->content }}</p>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group d-flex justify-content-between align-items-center">
                    <a class="text-body-secondary me-2" href="{{ route('posts.index') }}" title="{{ __('Back') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </a>
                    <a class="text-success me-1" href="{{ route('posts.edit', $post->id) }}" title="{{ __('Edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-transparent border-0">
                            <a class="text-danger me-2" title="{{ __('Delete') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                            </a>
                        </button>
                    </form>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <small class="text-body-secondary">{{ __('Published') }}: {{ $post->created_at->format('d.m.y') }}</small>
                </div>
            </div>
        </div>
    </div>
@endsection
