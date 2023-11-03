<ul class="menu_list1">
    <li class="menu_list_inner1 {{ (request()->is('user/dashboard')) ? 'active' : '' }}">
        <a href="{{ route('user.dashboard') }}">
            <h3 class="{{ (request()->is('user/dashboard')) ? 'active' : '' }}">Home</h3>
        </a>
    </li>

    <li class="menu_list_inner1 {{ (request()->is('user/order')) ? 'active' : '' }}">
        <a href="{{ route('user.order') }}">
            <h3 class="{{ (request()->is('user/order')) ? 'active' : '' }}">Orders</h3>
        </a>
    </li>
    @if (reffrelsetting('referral_status') === '1' ||reffrelsetting('referral_status') === 1)
    <li class="menu_list_inner1 {{ (request()->is('user/referral')) ? 'active' : '' }}">
        <a href="{{ route('user.referral') }}">
            <h3 class="{{ (request()->is('user/referral')) ? 'active' : '' }}">Referral</h3>
        </a>
    </li>
    @endif
    <li class="menu_list_inner1 {{ (request()->is('user/profile')) ? 'active' : '' }}">
        <a href="{{ route('user.profile.edit') }}">
            <h3 class="{{ (request()->is('user/profile')) ? 'active' : '' }}">profile</h3>
        </a>
    </li>

    <li class="menu_list_inner1 {{ (request()->is('user/profile-address')) ? 'active' : '' }}">
        <a href="{{ route('user.profile.address') }}">
            <h3 class="{{ (request()->is('user/profile-address')) ? 'active' : '' }}">Address</h3>
        </a>
    </li>
    <li class="menu_list_inner1 {{ (request()->is('user/confirm-passwords')) ? 'active' : '' }}">
        <a href="{{ route('user.confirm-passwords') }}">
            <h3 class="{{ (request()->is('user/confirm-passwords')) ? 'active' : '' }}">Change Password</h3>
        </a>
    </li>
    <li class="menu_list_inner1">
        <form method="POST" action="{{ route('user.logout') }}">  @csrf
            <a href="{{ route('user.logout') }}"  onclick="event.preventDefault(); this.closest('form').submit();">
                <h3> {{ __('Log Out') }}</h3>
            </a>
        </form>

    </li>
</ul>
