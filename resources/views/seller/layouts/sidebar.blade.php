<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Profile Section -->
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile"  />
                    <span class="login-status online"></span> <!-- change to offline or busy -->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Auth::guard('seller')->user()->name ?? 'Seller' }}</span>
                    <span class="text-secondary text-small">Seller</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>


        <!-- Dashboard -->
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ url('seller/dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li> --}}
        <!-- Blog Menu with Submenu -->
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#blog-menu" aria-expanded="false"
                aria-controls="blog-menu">
                <span class="menu-title">Blog</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-notebook menu-icon"></i>
            </a>
            <div class="collapse" id="blog-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/blog-categories') }}">Blog Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin.blogs.index') }}">Blogs</a>
                    </li>
                </ul>
            </div>
        </li> --}}
        <!-- Teams Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('seller/products') }}">
                <span class="menu-title">Products</span>
                <i class="mdi mdi-package-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('seller/orders') }}">
                <span class="menu-title">Orders</span>
                <i class="mdi mdi-truck-delivery menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('seller/earnings') }}">
                <span class="menu-title">Earnings & Payouts</span>
                <i class="mdi mdi-cash-multiple menu-icon"></i>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/services') }}">
                <span class="menu-title">Services</span>
                <i class="mdi mdi-briefcase-check menu-icon"></i>
            </a>
        </li>

        <!-- Home Slider Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/home-sliders') }}">
                <span class="menu-title">Home Slider</span>
                <i class="mdi mdi-image-area menu-icon"></i>
            </a>
        </li> --}}


        <!-- UI Elements with Submenu -->
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-elements" aria-expanded="false"
                aria-controls="ui-elements">
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-palette menu-icon"></i>
            </a>
            <div class="collapse" id="ui-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Modals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Typography</a>
                    </li>
                </ul>
            </div>
        </li> --}}

        <!-- Forms with Submenu -->
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#forms-menu" aria-expanded="false"
                aria-controls="forms-menu">
                <span class="menu-title">Forms</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-form-textbox menu-icon"></i>
            </a>
            <div class="collapse" id="forms-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Basic Elements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Advanced Elements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Validation</a>
                    </li>
                </ul>
            </div>
        </li> --}}

        <!-- Tables with Submenu -->
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables-menu" aria-expanded="false"
                aria-controls="tables-menu">
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
            <div class="collapse" id="tables-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Basic Table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data Table</a>
                    </li>
                </ul>
            </div>
        </li> --}}

        <!-- Charts -->
        {{-- <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="menu-title">Charts</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
        </li> --}}

        <!-- User Pages with Submenu -->
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#user-pages" aria-expanded="false"
                aria-controls="user-pages">
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="user-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Error 404</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Error 500</a>
                    </li>
                </ul>
            </div>
        </li> --}}

        <!-- Documentation -->
        {{-- <li class="nav-item">
            <a class="nav-link" href="#" target="_blank">
                <span class="menu-title">Documentation</span>
                <i class="mdi mdi-file-document-box menu-icon"></i>
            </a>
        </li> --}}
    </ul>
</nav>

<!-- partial -->
