@props(['route', 'sub', 'icon'])

<li class="nav-item">
    <a href="{{ route($route) }}" class="nav-link {{ currentRouteActive($active) }}">
        <i class="
        @isset($sub)
            far fa-circle
        @endisset

        nav-icon

        @isset($icon)
            far fa-{{ icon }}
        @endisset
        ">
        </i>
        <p>{{ $slot }}</p>
    </a>
</li>
