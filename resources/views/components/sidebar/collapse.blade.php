@props(['value', 'icon' => false])

@php
    $id = Str::uniqueId();
@endphp

<x-sidebar.link :icon="$icon" data-bs-target="#{{ $id }}" class="collapsed" href="#" data-bs-toggle="collapse">
    {{ $value }}
    <div class="sb-sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</x-sidebar.link>

<div id="{{ $id }}" class="collapse" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        {{ $slot }}
    </nav>
</div>
