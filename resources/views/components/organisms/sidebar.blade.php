@php 
$style = (session()->get('display') === "false")
    ? "width: 0px; opacity: 0;"
    : "";
@endphp

<aside class="sidebar d-none d-lg-flex py-4" id="sidebar" style="{{ $style }}">
    <div>
        <div class="branding-logo w-100 position-sticky fixed-top mb-4">
        
            <svg width="36.96" height="22.65" viewBox="0 0 37 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2192 1.1083L1.84046 10.311L0.839337 9.29072L10.2181 0.0880313L11.2192 1.1083Z" fill="#3366FF"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.009523 21.4334L20.5706 1.25824L21.5718 2.27851L1.01064 22.4536L0.009523 21.4334Z" fill="#3366FF"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M25.7411 21.5383L35.1199 12.3356L36.121 13.3559L26.7422 22.5586L25.7411 21.5383Z" fill="#3366FF"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M36.9508 1.21327L16.3897 21.3884L15.3886 20.3681L35.9497 0.192999L36.9508 1.21327Z" fill="#3366FF"/>
            </svg>
                
            <button type="button" class="btn d-block d-lg-none" id="btn-close">
                <em data-feather="x"></em>
            </button>
        </div>
        
        <div class="list-group accordion" id="accordion-parent">
            @if(isset($navigations))
            <x-molecules.accordion 
                :navigations="$navigations" />
            @endif
        </div>
    </div>

    <div class="user-settings">
        <div class="list-group">
            <a href="#settings"
                id="#settings" 
                title="settings"
                class="list-group-item list-group-item-action settings">
                <img src="{{ asset('images/setting.svg') }}"
                    alt="settings">
            </a>
            <a href="#"
                onclick="document.getElementById('logout-form').submit();"
                id="#logout" 
                title="logout"
                class="list-group-item list-group-item-action logout">
                <img src="{{ asset('images/logout.svg') }}"
                    alt="logout">
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</aside>