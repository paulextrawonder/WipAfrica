<div class="main-sidebar sidebar-style-2">
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="/user/dashboard">
      <img
        alt="image"
        src="{{asset('assets/img/logo.png')}}"
        class="header-logo"
      />
    </a>
  </div>

  <ul class="sidebar-menu mt-3 mb-4">
    <li class="{{Request::is("*/dashboard") ? 'active' : ''}}">
      <a class="nav-link" href="/user/dashboard"
        ><i class="material-icons">dashboard</i
        ><span>Dashboard</span></a
      >
    </li>
    <li class="dropdown">
      <a class="nav-link has-dropdown" href="#"
        ><i class="material-icons">person_outline</i
        ><span>Profile</span></a
      >
      <ul class="dropdown-menu">
        <li {{Request::is("*/profile*") ? 'active' : ''}}>
          <a class="nav-link" href="/user/profile" id="nav__dropdown"
            >My Profile</a
          >
        </li>
        <li>
          <a
            class="nav-link"
            href="/user/profile/account-details"
            id="nav__dropdown"
            >Bank Account Details</a
          >
        </li>
        <li>
          <a
            class="nav-link"
            href="/user/profile/next-of-kin"
            id="nav__dropdown"
            >Next Of Kin</a
          >
        </li>
        <li>
          <a
            class="nav-link"
            href="/user/profile/change-password"
            id="nav__dropdown"
            >Reset Password</a
          >
        </li>
      </ul>
    </li>
    <li {{Request::is("*/referer") ? 'active' : ''}}>
      <a class="nav-link awesome" href="/user/referer"
        ><i class="fas fa-users"></i><span>Referrals</span></a
      >
    </li>
    <li {{Request::is("*/notification") ? 'active' : ''}}>
      <a class="nav-link" href="/user/notifications"
        ><i class="material-icons">notifications</i
        ><span>Notification</span></a
      >
    </li>
    <li {{Request::is("*/property") ? 'active' : ''}}>
      <a class="nav-link" href="/user/property"
        ><i class="material-icons">location_city</i
        ><span>Projects</span></a
      >
    </li>
    <li {{Request::is("*/sales") ? 'active' : ''}}>
      <a class="nav-link" href="/user/sales"
        ><i class="material-icons">equalizer</i><span>Sales</span></a
      >
    </li>
    <!-- <li {{Request::is("*/comissions") ? 'active' : ''}}>
      <a class="nav-link" href="/user/comissions"
        ><i class="material-icons">credit_card</i
        ><span>Commissions</span></a
      >
    </li> -->
    <li {{Request::is("*/supports") ? 'active' : ''}}>
      <a class="nav-link" href="/user/supports"
        ><i class="material-icons">headset_mic</i
        ><span>Support</span></a
      >
    </li>
    <li>
                  <a class="nav-link awesome" 
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">            
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
             

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </a>
              </li>
  </ul>
</aside>
</div>