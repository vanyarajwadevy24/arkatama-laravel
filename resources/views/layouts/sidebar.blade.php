<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-danger" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div div style="font-family:Century Schoolbook" class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>

                    <a class="nav-link" href="/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link" href="/sliders">
                        <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                        Sliders
                    </a>
                    @if(Auth::check() && Auth::user()->roles->role_name == 'admin')
                    <div class="sb-sidenav-menu-heading">MANAGEMENT</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Products
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/categories">Category</a>
                            <a class="nav-link" href="{{ route ('products.index') }}">Products</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Users
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('roles.index') }}">Role</a>
                            <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                        </nav>
                    </div>
                    @endif
                </div>
            </div>
            <div div style="font-family:Century Schoolbook" class="sb-sidenav-footer bg-danger text-white">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->name }}
            </div>
        </nav>
    </div>