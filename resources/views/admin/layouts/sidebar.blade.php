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
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#order">
              <i class="fas fa-map-marker-alt"></i>
              <p>Manage Orders</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="order">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('order.index')}}">
                    <span class="sub-item">All Orders</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.pending-orders')}}">
                    <span class="sub-item">Pending Orders</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.processed-orders')}}">
                    <span class="sub-item">Processed Orders</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.shipped-orders')}}">
                    <span class="sub-item">Shipped Orders</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.out-for-delivery-orders')}}">
                    <span class="sub-item">Out For Delivery Orders</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.delivered-orders')}}">
                    <span class="sub-item">Delivered Orders</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.canceled-orders')}}">
                    <span class="sub-item">Cancelled Orders</span>
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
            <a data-bs-toggle="collapse" href="#policy">
              <i class="fas fa-th-list"></i>
              <p>Manage Policy</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="policy">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('shipping-rule.index')}}">
                    <span class="sub-item">Shipping Rule</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#payment">
              <i class="fas fa-th-list"></i>
              <p>Manage Payments</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="payment">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('admin.transaction')}}">
                    <span class="sub-item">Transactions</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('razorpay-setting.index')}}">
                    <span class="sub-item">Razorpay</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.cod-setting')}}">
                    <span class="sub-item">Cash on Delivery</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </div>