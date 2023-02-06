<nav class="navbar navbar-expand-lg main-navbar">
          <div class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li>
                <a
                  href="#"
                  data-toggle="sidebar"
                  class="nav-link nav-link-lg collapse-btn"
                  ><i class="material-icons">subject</i></a
                >
              </li>
            </ul>
          </div>
          <ul class="navbar-nav navbar-right">
            <li>
              <a
                href="#"
                data-toggle="dropdown"
                class="nav-link nav-link-lg nav-link-user"
              >
                <img alt="image" src="{{asset('users/profile_pic/'.$key_data->profile_pic)}}" class="" />
                <span class="d-sm-none d-lg-inline-block"></span
              ></a>
              <div class="dropdown-menu dropdown-menu-right">
                <p
                  class="dropdown-item font-13 w-100 overflow-hidden user-welcome"
                >
                 {{$key_data->first_name}} {{$key_data->last_name}}
                </p>
                <a href="/user/profile" class="dropdown-item has-icon main_font">
                  <i class="far fa-user"></i> My Account
                </a>
                <a href="/user/supports" class="dropdown-item has-icon main_font">
                  <i class="fas fa-headphones"></i>Support
                </a>
                <div class="dropdown-divider"></div>
                <a
                  href="{{route('logout')}}"
                  class="dropdown-item has-icon text-danger main_font"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                >
                  <i class="fas fa-sign-out-alt"></i> Logout

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </a>
              </div>
            </li>
          </ul>
        </nav>

        <div id='loader'></div>