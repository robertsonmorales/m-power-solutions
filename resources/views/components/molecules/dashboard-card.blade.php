<div class="{{ $class }}">
    <div class="card-body p-3">
        <div class="card-body-item">
            <img src="{{ asset('images/dashboard/folder-open-'.$mode.'.svg') }}" 
                alt="fodle"
                width="32"
                height="32">
            <h4 class="font-16 font-weight-600 mb-0 {{ $textClass }}">{{ $text }}</h4>
        </div>
        <em data-feather="chevron-right"></em>
    </div>
</div>