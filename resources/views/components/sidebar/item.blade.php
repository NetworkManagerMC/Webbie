@props(['active' => false])

@php
    $class = 'nav-item';

    if ($active) {
        $class .= ' active';
    }
@endphp

<li class="{{ $class }}">
    <x-sidebar.link {{ $attributes }}>{{ $slot }}</x-sidebar.link>
</li>
