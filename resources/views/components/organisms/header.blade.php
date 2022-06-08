<div class="sticky-top">
    <nav class="header-nav py-3 pl-3 pr-4">
        <div class="row no-gutters align-items-center">
            <button class="btn-menu" 
                type="button" 
                id="btn-menu">
                <em data-feather="play-circle"></em>
            </button>
        </div>

        <div class="nav-icons">
            <div class="search-input">
                <input type="text" name="search" placeholder="Search...">
                <img src="{{ asset('images/search.svg') }}"
                    alt="search"
                    width="14"
                    height="14">
            </div>

            <div class="notification">
                <a href="#notifications">
                    <img src="{{ asset('images/notification.svg') }}" alt="notif"
                    width="17"
                    height="20">
                </a>
            </div>
            
        </div>
    </nav>
</div>