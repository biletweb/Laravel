@extends('layouts.admin')

@section('content')
    @if($posts->count() == 0)
        <div class="alert alert-info text-center mb-0">
            {{ __('No Results') }}
        </div>
    @else
        <div class="card mb-3">
            <div class="card-body text-center">
                <table class="table table-borderless table-hover mb-0">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">{{ __('Post') }}</th>
                        <th scope="col">{{ __('Author') }}</th>
                        <th scope="col">{{ __('Published') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><small class="text-body-secondary">{{ $post->id }}</small></td>
                            <td style="width: 50%;">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#postText_{{ $post->id }}">
                                    {{ __('Show') }}
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="postText_{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header text-start">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $post->title }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                {{ $post->content }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td title="{{ $post->user->name }}">
                                @if($post->user->avatar)
                                    <img src="{{ asset('storage/' . $post->user->avatar) }}" style="width: 28px; height: 28px; object-fit: cover;" class="rounded-circle">
                                @else
                                    <svg class="bi" width="28" height="28" fill="currentColor">
                                        <use xlink:href="{{ asset('icons/bootstrap-icons.svg#person') }}"/>
                                    </svg>
                                @endif
                            </td>
                            <td><small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <form action="{{ route('dashboard.trash.restore', $post->id) }}">
                                        <button type="submit" class="btn btn-success btn-sm me-2">{{ __('Restore') }}</button>
                                    </form>
                                    <form action="{{ route('dashboard.trash.delete', $post->id) }}">
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                    </form>
                                </div>
                            </td>
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
