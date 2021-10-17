<x-base-layout class="sb-nav-fixed" {{ $attributes->merge(['assets' => 'sb-admin', 'id' => 'page-top']) }}>
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

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</x-base-layout>
