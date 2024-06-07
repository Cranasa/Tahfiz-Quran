<nav class="main-navbar">
  <div class="container">
      <ul>



          <li class="menu-item {{ Request::is('dashboard*') ? 'active' : '' }}">
              <a href="#" class='menu-link'>
                  <span><i class="bi bi-grid-fill"></i> Dashboard</span>
              </a>
          </li>

          <li class="menu-item has-sub {{ Request::is('user*') |
                    Request::is('menu2*') |
                    Request::is('menu3*') ? 'active' : '' }} ">
            <a href="#" class='menu-link'>
                <span><i class="bi bi-grid-1x2-fill"></i> Menu</span>
            </a>
            <div class="submenu">
                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                <div class="submenu-group-wrapper">

                    <ul class="submenu-group">

                        <li class="submenu-item  ">
                            <a href="#" class='submenu-link'>Menu 1</a>
                        </li>

                        <li class="submenu-item  ">
                            <a href="#" class='submenu-link'>Menu 2</a>
                        </li>

                    </ul>

                </div>
            </div>
        </li>

      </ul>
  </div>
</nav>
