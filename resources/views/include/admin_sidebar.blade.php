<div class="list-group shadow-sm rounded-2">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action @if(request()->routeIs('dashboard')) active @endif">{{ __('Dashboard') }}</a>
    <a href="{{ route('dashboard.liked') }}" class="list-group-item list-group-item-action @if(request()->routeIs('dashboard.liked')) active @endif">{{ __('My Liked Post') }}</a>
    <a href="{{ route('dashboard.comment') }}" class="list-group-item list-group-item-action @if(request()->routeIs('dashboard.comment')) active @endif">{{ __('My Comment') }}</a>
</div>
