@extends('layouts.main')
@section('content')

    @if($posts->count() == 0)
        <div class="alert alert-info text-center">
            {{ __('No Results') }}
        </div>
    @endif

    <div class="row row-cols-md-2">
        @foreach($posts as $post)
            <div class="col">
                <div class="card mb-4 rounded-2 shadow-sm">

                    <div class="card-header">
                        <h4 class="my-0 fw-normal">{{ str()->limit($post->title, 36, '...')  }}</h4>
                    </div>

                    <div class="card-body">
                        {!! str()->limit($post->content, 255, '...') !!}
                    </div>

                    <div class="d-flex justify-content-between align-items-center px-3 py-2 border-top">
                        <a class="text-body-secondary" href="{{ route('posts.show', $post->id) }}" title="{{ __('Show') }}">
                            <svg class="bi" width="24" height="24" fill="currentColor">
                                <use xlink:href="{{ asset('icons/bootstrap-icons.svg#book') }}"/>
                            </svg>
                        </a>
                        <small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <div class="mb-2">
        {{ $posts->links() }}
    </div>
@endsection
