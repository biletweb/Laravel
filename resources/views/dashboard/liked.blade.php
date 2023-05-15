@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Like') }}</div>
        <div class="card-body">
            <div class="container mt-3 mb-3">
                @if($posts->count() == 0)
                    <div class="alert alert-info text-center">
                        {{ __('No Results') }}
                    </div>
                @endif
                <table class="table table-striped">
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><a class="link-dark link-offset-2 link-underline link-underline-opacity-0" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td><small class="text-body-secondary">{{ $post->user->name }}</small></td>
                        <td><small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
