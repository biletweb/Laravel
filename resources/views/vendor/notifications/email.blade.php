{{-- Greeting --}}
<h1>@lang('Привіт!')</h1>

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}
@endforeach

{{-- Subcopy --}}
@lang("Follow the link to change your password:") {{ $displayableActionUrl }}
