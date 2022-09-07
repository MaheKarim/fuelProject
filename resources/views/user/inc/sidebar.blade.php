<nav class="sb-sidenav accordion bg-primary " style="color: white;" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('user.home') }}" style="color: white;">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Service</div>

            <a class="nav-link" href="{{ route('user.fuelDelivery') }}" style="color: white;">
                <div class="sb-nav-link-icon"><i class="fas fa-gas-pump"></i></div>
                Fuel Delivery
            </a>
            <a class="nav-link" href="{{ route('user.lpgIndex') }}" style="color: white;">
                <div class="sb-nav-link-icon"><i class="fas fa-pump-soap"></i></div>
                LPG Cylinder
            </a>
            <a class="nav-link" href="{{ route('user.carwash') }}" style="color: white;">
                <div class="sb-nav-link-icon"><i class="fas fa-caravan"></i></div>
                Car Wash
            </a>
            <a class="nav-link" href="#" style="color: white;">
                <div class="sb-nav-link-icon"><i class="fas fa-car-side"></i></div>
                Car Maintenance
            </a>

        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->name }}
    </div>
</nav>
