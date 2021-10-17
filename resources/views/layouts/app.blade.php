<x-base-layout class="sb-nav-fixed" {{ $attributes->merge(['assets' => 'sb-admin']) }}>
    @include('components.topbar')

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
