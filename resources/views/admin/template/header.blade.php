<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">ADMIN</a>
  <div class="navbar-nav d-flex flex-row-reverse">
  <div class="nav-item text-nowrap">
      <form action="/logout" method="post">
            @csrf
              <button type="submit" class="nav-link px-3 bg-dark border-0">
             Logout <span data-feather="log-out"></span></button>
            </form>
    </div>
  </div>
</header>