<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="theme/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="theme/assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="theme/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="theme/assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> 
                
                <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayoutsUsers" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarLayoutsUsers">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Người dùng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayoutsUsers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link"
                                    data-key="t-horizontal">Danh sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.users.create') }}" class="nav-link"
                                    data-key="t-horizontal">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Danh mục sản phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.catalogues.index') }}" class="nav-link"
                                    data-key="t-horizontal">Danh sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.catalogues.create') }}" class="nav-link"
                                    data-key="t-horizontal">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayoutsProducts" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarLayoutsProducts">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Sản phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayoutsProducts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.products.index') }}" class="nav-link"
                                    data-key="t-horizontal">Danh sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.products.create') }}" class="nav-link"
                                    data-key="t-horizontal">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#variant" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="variant">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Biến thể</span>
                    </a>
                    <div class="collapse menu-dropdown" id="variant">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#size" class="nav-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="size" data-key="t-calender">
                                    Size
                                </a>
                                <div class="collapse menu-dropdown" id="size">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.productSizes.index') }}" class="nav-link" data-key="t-main-calender">Danh sách</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.productSizes.create') }}" class="nav-link" data-key="t-month-grid">Thêm mới</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#color" class="nav-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="color" data-key="t-calender">
                                    Color
                                </a>
                                <div class="collapse menu-dropdown" id="color">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.productColors.index') }}" class="nav-link" data-key="t-main-calender">Danh sách</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.productColors.create') }}" class="nav-link" data-key="t-month-grid">Thêm mới</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.order.index') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Đơn hàng</span>
                    </a>
                </li> 

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>