<div class="sidebar" data-background-color="light">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
          <img
            src="{{ asset('admin/assets/img/kaiadmin/logo_dark.png') }}"
            alt="navbar brand"
            class="navbar-brand"
            height="20"
            width="170">
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item">
            <a href="{{url('/redirect/admin/dashboard')}}">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Components</h4>
          </li>
          
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts">
              <i class="fas fa-th-list"></i>
              <p>Manage Website</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="sidebarLayouts">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('slider.index')}}">
                    <span class="sub-item">Slider</span>
                  </a>
                </li>

                <li>
                  <a href="{{route('flash-sale.index')}}">
                    <span class="sub-item">Flash Sale</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#maps">
              <i class="fas fa-map-marker-alt"></i>
              <p>Manage Category</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="maps">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('category.index')}}">
                    <span class="sub-item">Category</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('sub-category.index')}}">
                    <span class="sub-item">Sub Category</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('child-category.index')}}">
                    <span class="sub-item">Child Category</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#base">
              <i class="fas fa-map-marker-alt"></i>
              <p>Manage Product</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="base">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('brand.index')}}">
                    <span class="sub-item">Brand</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('product.index')}}">
                    <span class="sub-item">Product</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('child-category.index')}}">
                    <span class="sub-item">Child Category</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayout">
              <i class="fas fa-th-list"></i>
              <p>Manage Coupons & Offers</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="sidebarLayout">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('coupons.index')}}">
                    <span class="sub-item">Coupons</span>
                  </a>
                </li>

                <li>
                  <a href="{{route('flash-sale.index')}}">
                    <span class="sub-item">Flash Sale</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#submenu">
              <i class="fas fa-bars"></i>
              <p>Menu Levels</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="submenu">
              <ul class="nav nav-collapse">
                <li>
                  <a data-bs-toggle="collapse" href="#subnav1">
                    <span class="sub-item">Level 1</span>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="subnav1">
                    <ul class="nav nav-collapse subnav">
                      <li>
                        <a href="#">
                          <span class="sub-item">Level 2</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <span class="sub-item">Level 2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <a data-bs-toggle="collapse" href="#subnav2">
                    <span class="sub-item">Level 1</span>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="subnav2">
                    <ul class="nav nav-collapse subnav">
                      <li>
                        <a href="#">
                          <span class="sub-item">Level 2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <a href="#">
                    <span class="sub-item">Level 1</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>