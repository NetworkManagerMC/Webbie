<x-base-layout {{ $attributes->merge(['assets' => 'sb-admin-2', 'id' => 'page-top']) }}>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <x-sidebar>
            <x-sidebar.item href="{{ route('dashboard.index') }}" active>
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </x-sidebar.item>

            <x-sidebar.divider />

            <x-sidebar.heading value="Interface" />

            <x-sidebar.collapse>
                <x-slot name="link">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </x-slot>

                <x-sidebar.collapse-heading value="Custom Components:" />
                <x-sidebar.collapse-item href="{{ url('/buttons') }}" value="Buttons" />
                <x-sidebar.collapse-item href="{{ url('/cards') }}" value="Cards" />
            </x-sidebar.collapse>
        </x-sidebar>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <x-topbar />

                <main>
                    <div class="container-fluid">
                        {{ $slot }}
                    </div>
                </main>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
