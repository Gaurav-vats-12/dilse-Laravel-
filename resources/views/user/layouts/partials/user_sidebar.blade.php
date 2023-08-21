<ul class="menu_list1">
    <li class="menu_list_inner1 {{ (request()->is('user/dashboard')) ? 'active' : '' }}">
        <a href="{{ route('user.dashboard') }}">
            <h3 class="{{ (request()->is('user/dashboard')) ? 'active' : '' }}">Home</h3>
        </a>
    </li>
    <li class="menu_list_inner1">
        <a href="">
            <h3>Orders</h3>
        </a>
    </li>
    <li class="menu_list_inner1 {{ (request()->is('user/profile')) ? 'active' : '' }}">
        <a href="{{ route('user.profile.edit') }}">
            <h3 class="{{ (request()->is('user/profile')) ? 'active' : '' }}">profile</h3>
        </a>
    </li>
    <li class="menu_list_inner1">
        <a href="">
            <h3>Adress</h3>
        </a>
    </li>
    <li class="menu_list_inner1">
        <a href="">
            <h3>Logout</h3>
        </a>
    </li>
</ul>
