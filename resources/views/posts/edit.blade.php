@extends('layouts.main')
@section('content')
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PATCH')
        <div class="p-4 bg-body-tertiary rounded-2">
            <h2 class="fw-bold">{{ __('Edit Post') }}</h2>

            <hr class="border-1 mb-4">

            <div class="row">
                <div class="col">
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $post->title }}" placeholder="{{ __('Title Post') }}">
                    @error('title')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <select name="category_id" class="form-select" id="category_id">
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
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="5" placeholder="{{ __('Content Post') }}">{{ $post->content }}</textarea>
                @error('content')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <hr class="border-1 mb-4">

            <div class="d-flex justify-content-between align-items-center">
                <a class="text-body-secondary me-2" href="{{ route('posts.show', $post->id) }}" title="{{ __('Back') }}">
                    <svg class="bi" width="24" height="24" fill="currentColor">
                        <use xlink:href="{{ asset('icons/bootstrap-icons.svg#arrow-return-left') }}"/>
                    </svg>
                </a>
                <button class="btn btn-outline-success" type="submit">{{ __('Edit') }}</button>
            </div>
        </div>
    </form>
@endsection
