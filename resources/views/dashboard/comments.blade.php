@extends('layouts.admin')

@section('content')
    @if($comments->count() == 0)
        <div class="alert alert-info text-center">
            {{ __('No Results') }}
        </div>
    @else
        <div class="card mb-3">
            <div class="card-body">
                <table class="table table-borderless table-hover mb-0">
                    <thead>
                    <tr>
{{--                        <th scope="col">№</th>--}}
                        <th scope="col">{{ __('Comment') }}</th>
                        <th scope="col" class="text-center">{{ __('Published') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
{{--                            <td style="width: 30px"><small class="text-body-secondary">{{ $loop->iteration }}</small></td>--}}
                            <td>
                                @if($comment->post->deleted_at != null)
                                    <span class="badge text-bg-danger me-1">{{ __('Unavailable') }}</span>
                                @endif
                                <a class="link-underline link-underline-opacity-0" href="{{ route('posts.show', $comment->post_id) }}#comment-{{ $comment->id }}">
                                    <small class="text-body-secondary">{{ str()->limit($comment->content, 100, '...')  }}</small>
                                </a>
                            </td>
                            <td style="width: 150px" class="text-center"><small class="text-body-secondary">{{ $comment->created_at->diffForHumans() }}</small></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mb-2">
            {{ $comments->links() }}
        </div>
    @endif
@endsection
