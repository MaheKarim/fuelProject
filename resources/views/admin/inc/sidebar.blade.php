<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('admin.home') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <div class="sb-sidenav-menu-heading">Pages</div>

            <a class="nav-link" href="{{ route('admin.fueldelivery') }}">
                <div class="sb-nav-link-icon"><i class="fab fa-audible"></i></div>
                Fuel Delivery
            </a>
            <a class="nav-link" href="{{ route('admin.lpg') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-gas-pump"></i></div>
               LPG Cylinder Delivery
            </a>
            <a class="nav-link" href="{{ route('admin.car-wash-admin') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-calender"></i></div>
               CarWash Request Service
            </a>
            <a class="nav-link" href="{{ route('admin.faq') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
               FAQ Service
            </a>


            <div class="sb-sidenav-menu-heading">Interface</div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Global Settings
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link" href="{{ route('admin.fueltype') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-gas-pump"></i></div>
                        Fuel Type
                    </a>
                    <a class="nav-link collapsed" href="{{ route('admin.refuelling') }}" >
                        <div class="sb-nav-link-icon"><i class="fas fa-file-prescription"></i></div>
                        Refueling For
                    </a>
                    <a class="nav-link collapsed" href="{{ route('admin.gasCylinderService') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                        LPG Cylinder Set
                    </a>
                    <a class="nav-link collapsed" href="{{ route('admin.prioritySee') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-walking"></i></div>
                        Priority Set
                    </a>
                </nav>
            </div>

        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->name }}
    </div>
</nav>
