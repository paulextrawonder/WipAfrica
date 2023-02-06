<div class="main-sidebar sidebar-style-2">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="#">
                <img
                  alt="image"
                  src="{{asset('assets/img/logo.png')}}"
                  class="header-logo"
                />
              </a>
            </div>

            <ul class="sidebar-menu mt-3 mb-4">
              <li class="{{Request::is("*/dashboard") ? 'active' : ''}}">
                <a class="nav-link" href="/admin/dashboard"
                  ><i class="material-icons">dashboard</i
                  ><span>Dashboard</span></a
                >
              </li>
              <li {{Request::is("*/account-password") ? 'active' : ''}}>
                <a class="nav-link awesome" href="/admin/account-password"
                  ><i class="material-icons font-16">account_circle</i
                  ><span>Account Password</span></a
                >
              </li>
              <li {{Request::is("*/account-settings") ? 'active' : ''}}>
                <a class="nav-link awesome" href="/admin/account-settings"
                  ><i class="material-icons font-16">settings</i
                  ><span>Account Settings</span></a
                >
              </li>
              <li class="dropdown">
                <a class="nav-link has-dropdown" href="#"
                  ><i class="fas fa-users"></i><span>Realtors</span></a
                >
                <ul class="dropdown-menu">
                  <li {{Request::is("*/realtor") ? 'active' : ''}}>
                    <a
                      class="nav-link"
                      href="/admin/realtor/active"
                      id="nav__dropdown"
                      >Active Realtors</a
                    >
                  </li>
                  <li>
                    <a
                      class="nav-link"
                      href="/admin/realtor/blocked"
                      id="nav__dropdown"
                    >
                      Block Realtors</a
                    >
                  </li>
                </ul>
              </li>
              <li {{Request::is("*/notification") ? 'active' : ''}}>
                <a class="nav-link awesome" href="/admin/notification"
                  ><i class="material-icons">notifications</i
                  ><span>Send Notifications</span></a
                >
              </li>
              <li {{Request::is("*/project") ? 'active' : ''}}>
                <a class="nav-link" href="/admin/project"
                  ><i class="material-icons">location_city</i
                  ><span>All Projects</span></a
                >
              </li>
              <li {{Request::is("*/sales") ? 'active' : ''}}>
                <a class="nav-link" href="/admin/sales"
                  ><i class="material-icons">equalizer</i
                  ><span>All Sales</span></a
                >
              </li>
              <li {{Request::is("*/comission") ? 'active' : ''}}>
                <a class="nav-link" href="/admin/comission"
                  ><i class="material-icons">credit_card</i
                  ><span>All Commissions</span></a
                >
              </li>
              <li {{Request::is("*/support") ? 'active' : ''}}>
                <a class="nav-link" href="/admin/support"
                  ><i class="material-icons">headset_mic</i
                  ><span>Support Tickets</span></a
                >
              </li>
              <li>
                  <a class="nav-link awesome" 
                    href="{{ route('adminLogout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">            
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
             

                <form id="logout-form" action="{{ route('adminLogout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </a>
              </li>
            </ul>
          </aside>
        </div>