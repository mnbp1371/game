<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
               href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="index.html">
                <img alt="logo" class="header-brand-img desktop-logo" src="/assets/images/brand/logo.png">
                <img alt="logo" class="header-brand-img light-logo1"
                     src="/assets/images/brand/logo-3.png">
            </a>
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <!-- FULL-SCREEN -->
                            <div class="dropdown d-flex profile-1">
                                <a class="nav-link leading-none d-flex" data-bs-toggle="dropdown"
                                   href="javascript:void(0)">
                                    <img alt="profile-user" class="avatar  profile-user brround cover-image"
                                         src="/assets/images/users/21.jpg">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading">
                                        <div class="text-center">
                                            <h5 class="text-dark mb-0 fs-14 fw-semibold">{{$user->name}}</h5>
                                            <small class="text-muted">{{__('admin')}}</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item" href="{{route('admin.logout')}}">
                                        <i class="dropdown-icon fe fe-alert-circle"></i>
                                        {{__('logout')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="demo-icon nav-link icon">
                    <i class="fe fe-settings fa-spin  text_primary"></i>
                </div>
            </div>
        </div>
    </div>
</div>
