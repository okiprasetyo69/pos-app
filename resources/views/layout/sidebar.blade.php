 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('') }}img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">App POS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('') }}img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ auth()->user()->name }} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if( auth()->user()->role == "manager")
          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->routeIs('purchases-manager') ||  request()->routeIs('sales-manager') ? 'active' : '">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard Manager
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/purchases-manager" class="nav-link {{ request()->routeIs('purchases-manager') ? 'active' : '">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Purchases</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/sales-manager" class="nav-link {{ request()->routeIs('sales-manager') ? 'active' : '">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Sales</p>
                </a>
              </li>

            </ul>
          </li>
          @endif
        

          @if( auth()->user()->role == "superadmin")
          <li class="nav-item menu-open">
            <a href="#" class="nav-link  {{ request()->routeIs('inventory-admin') ||  request()->routeIs('sales-admin') || request()->routeIs('sales-admin') ? 'active' : '">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard Cashier
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/inventory-admin" class="nav-link {{ request()->routeIs('inventory-admin') ? 'active' : '">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="/purchases-admin" class="nav-link  {{ request()->routeIs('purchase-admin') ? 'active' : '">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchases</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="/sales-admin" class="nav-link {{ request()->routeIs('sales-admin') ? 'active' : '">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report Income</p>
                </a>
              </li> -->
            </ul>
          </li>
          @endif
         
          @if( auth()->user()->role == "sales")
          <li class="nav-item">
            <a href="/sales" class="nav-link {{ request()->routeIs('sales') ? 'active' : '">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Riwayat Penjualan
              </p>
            </a>
          </li>
          @endif

          @if( auth()->user()->role == "purchase")
          <li class="nav-item">
            <a href="/purchases" class="nav-link {{ request()->routeIs('purchase') ? 'active' : '">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Riwayat Purchases
              </p>
            </a>
          </li>
          @endif

          @if( auth()->user()->role == "consumer")
          <li class="nav-item menu-open">
            <a href="#" class="nav-link  {{ request()->routeIs('sell-consumer') ||  request()->routeIs('buy-consumer') ? 'active' : '">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(auth()->user()->is_member == 0)
                <li class="nav-item">
                  <a href="/buy" class="nav-link  {{ request()->routeIs('buy-consumer') ? 'active' : '">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Items Customer</p>
                  </a>
                </li>
              @endif

              @if(auth()->user()->is_member == 1)
                <li class="nav-item">
                  <a href="/member" class="nav-link  {{ request()->routeIs('member') ? 'active' : '">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Items Member</p>
                  </a>
                </li>
              @endif
              <!-- <li class="nav-item">
                <a href="/sell" class="nav-link  {{ request()->routeIs('sell-consumer') ? 'active' : '">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/buy" class="nav-link  {{ request()->routeIs('buy-consumer') ? 'active' : '">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li> -->
            </ul>
          </li>
          @endif

          @if( auth()->user()->role == "member")
          <li class="nav-item">
            <a href="/member" class="nav-link {{ request()->routeIs('member') ? 'active' : '">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Riwayat Pembelian
              </p>
            </a>
          </li>
          @endif

          @if( auth()->user()->role == "cashier")
          <li class="nav-item">
            <a href="/cashier" class="nav-link {{ request()->routeIs('cashier') ? 'active' : '">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Riwayat Laporan
              </p>
            </a>
          </li>
          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>