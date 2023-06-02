@if($categories->count() == 0)
    <div class="alert alert-info text-center">
        {{ __('No Results') }}
    </div>
@else
    <div class="list-group shadow-sm rounded-2">
        @foreach($categories as $category)
            <a href="{{ route('posts.category', $category->id) }}" class="list-group-item list-group-item-action
        @if($category->id == request()->category_id) active @endif
        @if(isset(request()->post->category_id))
            @if($category->id == request()->post->category_id) active @endif
        @endif">{{ $category->title }}</a>
        @endforeach
    </div>
@endif
