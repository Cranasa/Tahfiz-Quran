<header>
  <nav class="navbar navbar-expand navbar-light navbar-top">
      <div class="container-fluid">
          <a href="#" class="burger-btn d-block">
              <i class="bi bi-justify fs-3"></i>
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="mt-2 pt-1 ms-3">
            <h4>
              {{ config('app.name') }}
            </h4>
          </div>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-lg-0">

              </ul>
              <div class="dropdown">
                  <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      <div class="user-menu d-flex">
                          <div class="user-name text-end me-3">
                              <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                              <p class="mb-0 text-sm text-gray-600 text-capitalize">{{ Auth::user()->role }}</p>
                          </div>
                          <div class="user-img d-flex align-items-center">
                              <div class="avatar avatar-md">
                                  <img src="/img/profile/{{ Auth::user()->foto }}">
                              </div>
                          </div>
                      </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                      <li>
                        <a class="dropdown-item" href="/profile/show"><i class="icon-mid bi bi-person me-2"></i> My Account</a>
                      </li>
                      <hr class="dropdown-divider">
                      </li>
                      <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </nav>
</header>
