<div class="list-group shadow-sm rounded-2">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action @if(request()->routeIs('dashboard')) active @endif">{{ __('Dashboard') }}</a>
    <a href="{{ route('dashboard.posts') }}" class="list-group-item list-group-item-action @if(request()->routeIs('dashboard.posts')) active @endif">{{ __('My posts') }}</a>
    <a href="{{ route('dashboard.liked') }}" class="list-group-item list-group-item-action @if(request()->routeIs('dashboard.liked')) active @endif">{{ __('My Liked Post') }}</a>
    <a href="{{ route('dashboard.comment') }}" class="list-group-item list-group-item-action @if(request()->routeIs('dashboard.comment')) active @endif">{{ __('My Comment') }}</a>
    @can('view', auth()->user())
    <hr class="border border-danger-subtle">
    <a href="{{ route('dashboard.category') }}" class="list-group-item list-group-item-action @if(request()->routeIs('dashboard.category')) active @endif">{{ __('Categories') }}</a>
    <a href="{{ route('dashboard.trash') }}" class="list-group-item list-group-item-action @if(request()->routeIs('dashboard.trash')) active @endif">{{ __('Deleted posts') }}</a>
    @endcan
</div>
