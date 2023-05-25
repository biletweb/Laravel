@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Avatar Upload') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.profile.avatar.upload') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex">
                    @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-fluid rounded-circle border border-secondary-subtle" style="width: 150px; height: 150px;">
                    @else
                        <img src="{{ asset('img/noAvatar.png') }}" class="img-fluid rounded-circle border border-secondary-subtle" style="width: 150px; height: 150px;">
                    @endif
                    <div class="ms-3 me-3 my-auto w-100">
                        <input type="file" name="avatar" class="form-control">
                        @error('avatar')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-primary my-auto me-2">{{ __('Upload') }}</button>
                    <a class="btn btn-danger my-auto" href="{{ route('dashboard.profile.avatar.delete') }}" role="button">{{ __('Delete') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
