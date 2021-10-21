<x-base-layout class="sb-nav-fixed" {{ $attributes->merge(['assets' => 'sb-admin']) }}>
    <x-topbar>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <a href="{{ route('logout') }}"
                           class="dropdown-item"
                           onclick="event.preventDefault();this.closest('form').submit();">
                           {{ __('auth.logout') }}
                        </a>
                    </form>
                </li>
            </ul>
        </li>
    </x-topbar>

    <div id="layoutSidenav">
        <x-sidebar>
            <x-sidebar.heading value="Heading" />

            <x-sidebar.link
                :href="route('dashboard.index')"
                value="Dashboard"
                icon="fas fa-link"
            />

            <x-sidebar.heading value="Heading" />

            <x-sidebar.collapse value="Links" icon="fas fa-columns">
                <x-sidebar.link
                    :href="route('dashboard.index')"
                    value="Link"
                    icon="fas fa-link"
                />

                <x-sidebar.link
                    :href="route('dashboard.index')"
                    value="Link"
                    icon="fas fa-link"
                />
            </x-sidebar.collapse>
        </x-sidebar>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    {{ $slot }}
                </div>
            </main>

            @include('components.footer')
        </div>
    </div>
</x-base-layout>
