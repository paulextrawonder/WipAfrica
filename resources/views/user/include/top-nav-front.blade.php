<nav class="navbar navbar-expand-lg main-navbar">
          <div class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li>
                <a
                  href="#"
                  data-toggle="sidebar"
                  class="nav-link nav-link-lg collapse-btn"
                  ><i class="fas fa-align-left"></i
                ></a>
              </li>
              <li class="smm-title">
                <span class="d-block nav_header-h1">Welcome, {{$user->last_name}}</span>
                <span class="nav_header-text">Lets get you started</span>
              </li>
            </ul>
          </div>
          <ul class="navbar-nav navbar-right">
            <!-- <li class="dropdown dropdown-list-toggle">
              <a
                href="#"
                data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg beep"
                ><i class="far fa-bell"></i
              ></a>
            </li> -->
            <li class="dropdown">
              <a
                href="#"
                data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user"
              >
                <img
                  alt="image"
                  src="../../assets/img/dashboard/avatar.svg"
                  class="" />
                <span class="d-sm-none d-lg-inline-block"></span
              ></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="/profile" class="dropdown-item has-icon main_font">
                  <i class="far fa-user"></i> View Profile
                </a>
                <a href="#" class="dropdown-item has-icon main_font">
                  <i class="fas fa-wallet"></i>Transactions
                </a>
                <a href="#" class="dropdown-item has-icon main_font">
                  <i class="fas fa-headphones"></i>Support
                </a>
                <div class="dropdown-divider"></div>
                <a
                  href="#"
                  class="dropdown-item has-icon text-danger main_font"
                >
                <a class="nav-link awesome" 
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">            
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> >
                </a>
              </div>
            </li>
          </ul>
        </nav>