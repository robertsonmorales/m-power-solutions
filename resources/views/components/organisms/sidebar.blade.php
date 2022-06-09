@php 
$style = (session()->get('display') === "false")
    ? "width: 0px; opacity: 0;"
    : "";
@endphp

<aside class="sidebar d-none d-lg-flex py-4" id="sidebar" style="{{ $style }}">
    <div>
        <div class="branding-logo w-100 position-sticky fixed-top">
        
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

                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 9.10998V14.88C3 17 3 17 5 18.35L10.5 21.53C11.33 22.01 12.68 22.01 13.5 21.53L19 18.35C21 17 21 17 21 14.89V9.10998C21 6.99998 21 6.99999 19 5.64999L13.5 2.46999C12.68 1.98999 11.33 1.98999 10.5 2.46999L5 5.64999C3 6.99999 3 6.99998 3 9.10998Z" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <a href="#"
                onclick="document.getElementById('logout-form').submit();"
                id="#logout" 
                title="logout"
                class="list-group-item list-group-item-action logout">
                
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.4399 14.62L19.9999 12.06L17.4399 9.5" stroke="#8F9BB3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.76001 12.06H19.93" stroke="#8F9BB3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.76 20C7.34001 20 3.76001 17 3.76001 12C3.76001 7 7.34001 4 11.76 4" stroke="#8F9BB3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                    
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</aside>

@section('script-src')
<script>
var selectedNav = window.location.pathname;
var pathname = selectedNav.split('/').reverse()[0];

for (let i = 0; i < $('.list-group-item-action').length; i++) {
    if($('.list-group-item-action')[i].classList.contains(pathname)){
        $('.list-group-item-action')[i].classList.add('active-tab');
    }
}
</script>
@endsection