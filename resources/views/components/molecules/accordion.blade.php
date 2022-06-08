@foreach($navigations['navs'] as $key => $nav)
    @if($nav['nav_type'] == "single")
    <a href="{{ url('/'.$nav['nav_route']) }}"
        id="{{ $nav['nav_route'] }}" 
        title="{{ $nav['nav_name'] }}"
        class="list-group-item list-group-item-action {{ $nav['nav_route'] }}">
        <img src="{{ asset('images/'.$nav['nav_icon'].'.svg') }}"
            alt="{{ $nav['nav_icon'] }}">
    </a>
    @endif
@endforeach