{{-- <x-sidebar.sidebar-parent text="" icon=""> --}}
<li class="sidebar-item has-sub {{$active}}">
    <a href="#" class='sidebar-link'>
        <i class="{{$icon}}"></i>
        <span>{{$text}}</span>
    </a>
    <ul class="submenu {{$active}} {{$open}}">
        {{ $slot }}
    </ul>
</li>
