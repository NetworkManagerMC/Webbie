@php
    $id = Str::uniqueId();
@endphp

<li class="nav-item">
    <x-sidebar.link class="collapsed" href="#" data-toggle="collapse" data-target="#{{ $id }}" aria-expanded="true" aria-controls="{{ $id }}">
        {{ $link }}
    </x-sidebar.link>

    <div id="{{ $id }}" class="collapse" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            {{ $slot }}
        </div>
    </div>
</li>
