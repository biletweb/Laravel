@extends('layouts.main')
@section('content')
    <div class="p-3 mb-3 bg-body-tertiary rounded-2 shadow-sm">

        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
            <div class="d-flex align-items-center mb-3">
                <div title="{{ __('Category') }}">
                    <svg class="bi me-2" width="24" height="24" fill="currentColor">
                        <use xlink:href="{{ asset('icons/bootstrap-icons.svg#view-list') }}"/>
                    </svg>
                </div>
                <small class="text-body-secondary float-start me-4">{{ $post->category->title }}</small>

                <div title="{{ __('User') }}">
                    @if($post->user->avatar)
                        <img src="{{ asset('storage/' . $post->user->avatar) }}" style="width: 24px; height: 24px; object-fit: cover;" class="rounded-circle me-2">
                    @else
                        <svg class="bi me-2" width="24" height="24" fill="currentColor">
                            <use xlink:href="{{ asset('icons/bootstrap-icons.svg#person') }}"/>
                        </svg>
                    @endif
                </div>
                <small class="text-body-secondary float-start me-4">{{ $post->user->name }}</small>
            </div>

            <div class="d-flex justify-content-end mb-3">
                <div class="me-2">{{ $post->liked_users_count }}</div>

                <form action="{{ route('posts.liked', $post->id) }}" method="POST">
                    @csrf
                    @if(auth()->user()->likedPost->contains($post->id))
                        <button type="submit" class="bg-transparent border-0 p-0">
                            <a class="text-body-secondary" title="{{ __('Dislike') }}">
                                <svg class="bi" width="24" height="24" fill="currentColor">
                                    <use xlink:href="{{ asset('icons/bootstrap-icons.svg#heart-fill') }}"/>
                                </svg>
                            </a>
                        </button>
                    @else
                        <button type="submit" class="bg-transparent border-0 p-0">
                            <a class="text-body-secondary" title="{{ __('Like') }}">
                                <svg class="bi" width="24" height="24" fill="currentColor">
                                    <use xlink:href="{{ asset('icons/bootstrap-icons.svg#heart') }}"/>
                                </svg>
                            </a>
                        </button>
                    @endif
                </form>
            </div>
        </div>

        <div class="border-bottom mb-3">
            <div class="mb-3">
                <h4 class="fw-bold">{{ $post->title }}</h4>
                <div class="fs-5">{!! $post->content !!}</div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <a class="text-body-secondary me-2" href="{{ redirect()->back()->getTargetUrl() }}" title="{{ __('Back') }}">
                    <svg class="bi" width="24" height="24" fill="currentColor">
                        <use xlink:href="{{ asset('icons/bootstrap-icons.svg#arrow-return-left') }}"/>
                    </svg>
                </a>

                @can('view', auth()->user())
                    <a class="text-success me-2" href="{{ route('posts.edit', $post->id) }}" title="{{ __('Edit') }}">
                        <svg class="bi" width="24" height="24" fill="currentColor">
                            <use xlink:href="{{ asset('icons/bootstrap-icons.svg#pencil-square') }}"/>
                        </svg>
                    </a>
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-transparent border-0 p-0">
                            <a class="text-danger me-2" title="{{ __('Delete') }}">
                                <svg class="bi" width="24" height="24" fill="currentColor">
                                    <use xlink:href="{{ asset('icons/bootstrap-icons.svg#trash') }}"/>
                                </svg>
                            </a>
                        </button>
                    </form>
                @endcan
            </div>

            <small class="text-body-secondary">
                {{ __('Published') }}: {{ $post->created_at->diffForHumans() }}<br>
                @if($post->created_at != $post->updated_at)
                    {{ __('Published Edit') }}: {{ $post->updated_at->diffForHumans() }}
                @endif
            </small>
        </div>

    </div>

    <div class="d-flex mb-4 mt-4 align-items-center justify-content-between">
        <h4 class="fw-bold">{{ __('Comments') }}: ({{ $post->comments->count() }})</h4>
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
        <div class="list-group mb-4 list-group-item shadow-sm border-1" id="comment-{{ $comment->id }}">
            <div class="d-flex justify-content-between">
                <div title="{{ __('User') }}">
                    @if($comment->user->avatar)
                        <img src="{{ asset('storage/' . $comment->user->avatar) }}" style="width: 24px; height: 24px; object-fit: cover;" class="rounded-circle">
                    @else
                        <svg class="bi" width="24" height="24" fill="currentColor">
                            <use xlink:href="{{ asset('icons/bootstrap-icons.svg#person') }}"/>
                        </svg>
                    @endif
                    <small class="text-body-secondary">
                        {{ $comment->user->name }}
                    </small>
                </div>

                <div>
                    <small class="text-body-secondary">
                        {{ $comment->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
            <div class="fs-5">
                {{ $comment->content }}
            </div>
            <!-- Modal button comment answer -->
            <div class="d-flex">
                <a role="button" data-bs-toggle="modal" data-bs-target="#comment_answer_{{ $comment->id }}" title="{{ __('Answer Comment') }}">
                    <svg class="bi" width="16" height="16" fill="currentColor">
                        <use xlink:href="{{ asset('icons/bootstrap-icons.svg#chat') }}"/>
                    </svg>
                </a>
                @can('view', auth()->user())
                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-transparent border-0 p-0">
                            <a class="text-danger ms-2" title="{{ __('Delete') }}">
                                <svg class="bi" width="16" height="16" fill="currentColor">
                                    <use xlink:href="{{ asset('icons/bootstrap-icons.svg#trash') }}"/>
                                </svg>
                            </a>
                        </button>
                    </form>
                @endcan
            </div>
            <!-- Modal comment answer -->
            <div class="modal fade" id="comment_answer_{{ $comment->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Answer Comment') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('comments.answer', $comment->id) }}?post_id={{ $post->id }}" method="POST">
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

        @foreach($comment->answers as $answer)
            <div class="d-flex justify-content-end" id="answer-{{ $answer->id }}">
                <div class="list-group mb-4 w-75 rounded-2 shadow-sm">
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div title="{{ __('User') }}">
                                @if($answer->user->avatar)
                                    <img src="{{ asset('storage/' . $answer->user->avatar) }}" style="width: 24px; height: 24px; object-fit: cover;" class="rounded-circle">
                                @else
                                    <svg class="bi" width="24" height="24" fill="currentColor">
                                        <use xlink:href="{{ asset('icons/bootstrap-icons.svg#person') }}"/>
                                    </svg>
                                @endif
                                <small class="text-body-secondary">{{ $answer->user->name }}</small>
                            </div>
                            <small class="text-body-secondary">{{ $answer->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="fs-5">
                            {{ $answer->content }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
@endsection
