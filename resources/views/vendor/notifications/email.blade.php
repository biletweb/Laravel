{{-- Greeting --}}
<h1>@lang('Привіт!')</h1>

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}
@endforeach

{{-- Subcopy --}}
@lang("Для скидання пароля перейдіть за посиланням:") {{ $displayableActionUrl }}
