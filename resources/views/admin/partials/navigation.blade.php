<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-bell"></i>
<span class="badge badge-warning navbar-badge">{{ Auth::guard('admin')->user()->unreadNotifications->count() }}</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<span class="dropdown-item dropdown-header">{{ Auth::guard('admin')->user()->unreadNotifications->count() }} Notifications</span>
<div class="dropdown-divider"></div>
@if (Auth::guard('admin')->user()->unreadNotifications)
@foreach (Auth::guard('admin')->user()->unreadNotifications as $notification)
<a href="#" class="dropdown-item"> {!! Str::limit(strip_tags($notification->data['data']), 30) !!} </a>
@endforeach
@endif
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
</div>
</li> -->

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">{{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : '' }}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                style="left: 0px; right: inherit;">
                <li><a href="{{ route('admin.profile.edit') }}" class="dropdown-item">Setting</a></li>
                <li>
                    <form method="POST" action="{{ route('admin.logout') }}"> @csrf <x-responsive-nav-link
                            :href="route('admin.logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="dropdown-item py-1 d-flex align-items-center justify-content-between"> <span>
                                {{ __('Log Out') }}</span> </form>
                    </x-responsive-nav-link>

                </li>
            </ul>
        </li>
    </ul>
</nav>
