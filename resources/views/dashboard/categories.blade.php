@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('dashboard.category.create') }}" class="d-flex justify-content-between align-items-center">
                        @csrf
                        <div class="w-100">
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="{{ __('Title Post') }}">
                            @error('title')
                            <div class="alert alert-danger mt-1 mb-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-25">
                            <button class="btn btn-outline-primary ms-3" type="submit">{{ __('Add category') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="border">
            @if($categories->count() == 0)
                <div class="alert alert-info text-center">
                    {{ __('No Results') }}
                </div>
            @else
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">{{ __('Categories') }}</th>
                        <th scope="col" class="text-center">{{ __('Published') }}</th>
                        <th scope="col" class="text-center">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td style="width: 30px"><small class="text-body-secondary">{{ $loop->iteration }}</small></td>
                            <td>
                                @if($category->deleted_at != null)
                                    <span class="badge text-bg-warning me-1">{{ __('Archival') }}</span>
                                    <small class="text-body-secondary">{{ str()->limit($category->title, 100, '...')  }}</small>
                                @else
                                    <small class="text-body-secondary">{{ str()->limit($category->title, 100, '...')  }}</small>
                                @endif
                            </td>
                            <td style="width: 150px" class="text-center"><small class="text-body-secondary">{{ $category->created_at->diffForHumans() }}</small></td>
                            <td style="width: 300px" class="text-center">
                                <div class="d-flex justify-content-center">
                                    @if($category->deleted_at != null)
                                        <form action="{{ route('dashboard.category.restore', $category->id) }}">
                                            <button type="submit" class="btn btn-success btn-sm me-2">{{ __('Restore') }}</button>
                                        </form>
                                    @endif
                                    @if($category->deleted_at == null)
                                        <form action="{{ route('dashboard.category.delete', $category->id) }}">
                                            <button type="submit" class="btn btn-warning btn-sm me-2">{{ __('In the archive') }}</button>
                                        </form>
                                    @endif
                                    @if($category->deleted_at != null)
                                        <form action="{{ route('dashboard.category.forceDelete', $category->id) }}">
                                            <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    @endif
@endsection
