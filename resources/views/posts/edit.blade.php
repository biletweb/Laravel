@extends('layouts.main')
@section('content')
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PATCH')
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <h2 class="fw-bold">{{ __('Edit Post') }}</h2>
            <hr>
            <div class="row mt-4">
                <div class="col">
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" placeholder="{{ __('Title Post') }}">
                    @error('title')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <select name="category_id" class="form-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected($category->id == $post->category->id)>{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mt-4 mb-4">
                <textarea name="content" class="form-control" rows="5" placeholder="{{ __('Content Post') }}">{{ $post->content }}</textarea>
                @error('content')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="btn-group">
                    <a class="text-body-secondary me-2" href="{{ route('posts.show', $post->id) }}" title="{{ __('Back') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </a>
                </div>
                <button class="btn btn-outline-primary" type="submit">{{ __('Edit') }}</button>
            </div>
        </div>
    </form>
@endsection
