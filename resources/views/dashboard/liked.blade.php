@extends('layouts.admin')

@section('content')
    @if($posts->count() == 0)
        <div class="alert alert-info text-center mb-0">
            {{ __('No Results') }}
        </div>
    @else
        <div class="card mb-3">
            <div class="card-body">
                <table class="table table-borderless table-hover mb-0">
                    <thead>
                    <tr>
{{--                        <th scope="col">№</th>--}}
                        <th scope="col">{{ __('Post') }}</th>
                        <th scope="col" class="text-center">{{ __('Author') }}</th>
                        <th scope="col" class="text-center">{{ __('Published') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
{{--                            <td style="width: 30px"><small class="text-body-secondary">{{ $loop->iteration }}</small></td>--}}
                            <td>
                                @if($post->deleted_at != null)
                                    <span class="badge text-bg-danger me-1">{{ __('Unavailable') }}</span>
                                @endif
                                <a class="link-underline link-underline-opacity-0" href="{{ route('posts.show', $post->id) }}">
                                    <small class="text-body-secondary">{{ str()->limit($post->title, 100, '...')  }}</small>
                                </a>
                            </td>
                            <td style="width: 100px" class="text-center" title="{{ $post->user->name }}">
                                @if($post->user->avatar)
                                    <img src="{{ asset('storage/' . $post->user->avatar) }}" style="width: 28px; height: 28px; object-fit: cover;" class="rounded-circle">
                                @else
                                    <svg class="bi" width="28" height="28" fill="currentColor">
                                        <use xlink:href="{{ asset('icons/bootstrap-icons.svg#person') }}"/>
                                    </svg>
                                @endif
                            </td>
                            <td style="width: 150px" class="text-center"><small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mb-2">
            {{ $posts->links() }}
        </div>
    @endif
@endsection
