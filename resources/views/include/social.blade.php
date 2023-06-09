<ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
    @if(config('app.telegram') != '')
        <li><a class="text-body-secondary ms-2" href="{{ config('app.telegram') }}" target="_blank" title="Telegram">
                <svg class="bi" width="24" height="24" fill="currentColor">
                    <use xlink:href="{{ asset('icons/bootstrap-icons.svg#telegram') }}"/>
                </svg>
            </a>
        </li>
    @endif
    @if(config('app.facebook') != '')
        <li><a class="text-body-secondary ms-2" href="{{ config('app.facebook') }}" target="_blank" title="Facebook">
                <svg class="bi" width="24" height="24" fill="currentColor">
                    <use xlink:href="{{ asset('icons/bootstrap-icons.svg#facebook') }}"/>
                </svg>
            </a>
        </li>
    @endif
    @if(config('app.twitter') != '')
        <li><a class="text-body-secondary ms-2" href="{{ config('app.twitter') }}" target="_blank" title="Twitter">
                <svg class="bi" width="24" height="24" fill="currentColor">
                    <use xlink:href="{{ asset('icons/bootstrap-icons.svg#twitter') }}"/>
                </svg>
            </a>
        </li>
    @endif
</ul>
