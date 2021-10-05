<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/orders" class="nav-link {{ Request::is('dashboard/pesan*') ? 'active' : '' }}">
              <span data-feather="shopping-cart"></span>
              Daftar Pesanan
            </a>
          </li>
        </ul>
      </div>
    </nav>