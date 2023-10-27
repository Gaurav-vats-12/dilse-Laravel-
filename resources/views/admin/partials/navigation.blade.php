<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
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
