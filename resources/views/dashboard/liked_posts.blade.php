@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Like') }}</div>
        <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">{{ __('Name Post') }}</th>
                        <th scope="col">{{ __('User') }}</th>
                        <th scope="col">{{ __('Published') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
