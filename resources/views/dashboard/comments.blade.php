@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Comments') }}</div>
        <div class="card-body">
            <div class="container mt-3 mb-3">
                @if($comments->count() == 0)
                    <div class="alert alert-info text-center">
                        {{ __('No Results') }}
                    </div>
                @endif
                <table class="table table-striped">
                    <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><a class="link-dark link-offset-2 link-underline link-underline-opacity-0" href="{{ route('posts.show', $comment->post_id) }}">{{ str()->limit($comment->content, 140, '...')  }}</a></td>
                        <td><small class="text-body-secondary">{{ $comment->created_at->diffForHumans() }}</small></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
