<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <span class="mdi mdi-account-circle account-profile"></span>
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $user ?></span>
                  <span class="text-secondary text-small">Administrator</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin">
                <span class="menu-title">Product</span>
                <i class="mdi mdi-package-variant-closed menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="/order" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Order</span>
                <i class="mdi mdi-truck menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/customer">
                <span class="menu-title">Customers</span>
                <i class="mdi mdi-account-group menu-icon"></i>
              </a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Logout</span>
                <i class="mdi mdi-logout menu-icon"></i>
              </a>
            </li>
            <li class="nav-item sidebar-actions">
            </li>
          </ul>
        </nav>