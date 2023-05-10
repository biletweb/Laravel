@extends('layouts.main')
@section('content')
    <div class="p-3 mb-4 bg-body-tertiary rounded-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group align-items-center">
                    <span title="{{ __('Category') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-view-list me-2" viewBox="0 0 16 16">
                            <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                        </svg>
                    </span>
                <small class="text-body-secondary rounded float-start me-4">{{ $post->category->title }}</small>
                <span title="{{ __('User') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person me-2" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg>
                </span>
                <small class="text-body-secondary rounded float-start me-4">{{ $post->user->name }}</small>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <span>{{ $post->liked_users_count }}</span>
                <form action="{{ route('posts.liked', $post->id) }}" method="POST">
                    @csrf
                    @if(auth()->user()->likedPost->contains($post->id))
                        <button type="submit" class="bg-transparent border-0 p-0">
                            <a class="text-body-secondary me-2" href="#" title="{{ __('Dislike') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                            </a>
                        </button>
                    @else
                        <button type="submit" class="bg-transparent border-0 p-0">
                            <a class="text-body-secondary me-2" href="#" title="{{ __('Like') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                            </a>
                        </button>
                    @endif
                </form>
            </div>
        </div>
        <hr>
        <h4 class="fw-bold">{{ $post->title }}</h4>
        <p class="col-md-12 fs-5">{{ $post->content }}</p>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group d-flex justify-content-between align-items-center">
                <a class="text-body-secondary me-4" href="{{ redirect()->back()->getTargetUrl() }}" title="{{ __('Back') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                </a>
                @can('view', auth()->user())
                    <a class="text-success me-2" href="{{ route('posts.edit', $post->id) }}" title="{{ __('Edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-transparent border-0 p-0">
                            <a class="text-danger me-2" title="{{ __('Delete') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                            </a>
                        </button>
                    </form>
                @endcan
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <small class="text-body-secondary">
                    {{ __('Published') }}: {{ $post->created_at->diffForHumans() }}<br>
                    @if($post->created_at != $post->updated_at)
                        {{ __('Published Edit') }}: {{ $post->updated_at->diffForHumans() }}
                    @endif
                </small>
            </div>
        </div>
    </div>
    <div class="d-flex mb-4 align-items-center justify-content-between">
        <h4 class="fw-bold mt-2">{{ __('Comments') }}: ({{ $post->comments->count() }})</h4>
        <!-- Modal button comment add -->
        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#comment_add">
            {{ __('Add Comment') }}
        </button>
        <!-- Modal comment add -->
        <div class="modal fade" id="comment_add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Add Comment') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('posts.comment', $post->id) }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="5" placeholder="{{ __('Content Post') }}"></textarea>
                            </div>
                            @error('content')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary btn-sm">{{ __('Add Comment button') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($post->comments as $comment)
        <div class="list-group mb-4">
            <div class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                    <small class="text-body-secondary">
                        <span title="{{ __('User') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                            </svg>
                        </span>
                        {{ $comment->user->name }}
                    </small>
                    <div>
                        <small class="text-body-secondary">
                            {{ $comment->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
                <p class="mb-0 fs-5">{{ $comment->content }}</p>
                <!-- Modal button comment answer -->
                <a role="button" data-bs-toggle="modal" data-bs-target="#comment_answer_{{ $comment->id }}" title="{{ __('Answer Comment') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                        <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    </svg>
                </a>
                <!-- Modal comment answer -->
                <div class="modal fade" id="comment_answer_{{ $comment->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Answer Comment') }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="#" method="POST">
                                <div class="modal-body">
                                    @csrf
                                    <div>
                                        <textarea name="content" class="form-control" rows="5" placeholder="{{ __('Content Post') }}"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary btn-sm">{{ __('Add Comment button') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
{{--        <div class="d-flex justify-content-end">--}}
{{--            <div class="list-group mb-4 w-75">--}}
{{--            <span class="list-group-item">--}}
{{--                <div class="d-flex w-100 justify-content-between">--}}
{{--                    <small class="text-body-secondary">biletweb</small>--}}
{{--                    <small class="text-body-secondary">3 days ago</small>--}}
{{--                </div>--}}
{{--                <p class="mb-1 fs-5">Some placeholder content in a paragraph.</p>--}}
{{--            </span>--}}
{{--            </div>--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chat ms-2" viewBox="0 0 16 16">--}}
{{--                <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>--}}
{{--            </svg>--}}
{{--        </div>--}}
@endsection
