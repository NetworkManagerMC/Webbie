<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{ $slot }}
            </div>
        </div>

        <div class="sb-sidenav-footer">
            <div class="small">{{ __('auth.logged-in-as') }}:</div>
            {{ Auth::user()->username }}
        </div>
    </nav>
</div>
