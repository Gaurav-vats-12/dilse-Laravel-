<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : '' }}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
              <li><a href="{{route('admin.profile.edit')}}" class="dropdown-item">Setting</a></li>
              <li>
              <form method="POST" action="{{ route('admin.logout') }}"> @csrf  <x-responsive-nav-link :href="route('admin.logout')" class="dropdown-item"> {{ __('Log Out') }}</form>   </x-responsive-nav-link>
              </li>
            </ul>
          </li>
    </ul>
  </nav>
