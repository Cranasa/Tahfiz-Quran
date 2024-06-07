<div class="header-top">
  <div class="container">
      <div class="logo">
          <a href="index.html"><img src="/img/logo/logo.png" alt="Logo"></a>
      </div>
      <div class="header-top-right">

          <div class="dropdown">
              <a href="#" id="topbarUserDropdown"
                  class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="avatar avatar-md2">
                      <img src="/img/profile/{{ Auth::user()->foto }}" alt="Avatar">
                  </div>
                  <div class="text">
                      <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                      <p class="user-dropdown-status text-sm text-muted text-capitalize">{{ Auth::user()->role }}</p>
                  </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end shadow-lg"
                  aria-labelledby="topbarUserDropdown">
                  <li><a class="dropdown-item" href="/profile/show">My Account</a></li>
                  <li>
                      <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-logout">Logout</a></li>
              </ul>
          </div>

          <!-- Burger button responsive -->
          <a href="#" class="burger-btn d-block d-xl-none">
              <i class="bi bi-justify fs-3"></i>
          </a>
      </div>
  </div>
</div>
