  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('admin.dashboard') }}" class="brand-link">
          <img src="{{ setting('logo') != null ? url('/storage/site/logo/' . setting('logo') . '') : asset('frontend/img/white-logo.svg') }}"
              alt="Dil Se" class="brand-image" style="opacity: .8">
          <span class="brand-text font-weight-light">Admin Panel</span>
      </a>
      <div class="sidebar">
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}" ajax_url="{{ route('admin.dashboard') }}"
                          class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }} ajax_redirect_url"
                          type="desktop">
                          <p>
                              {{ __('Dashboard') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.order.index') }}"
                          class="nav-link {{ request()->is('admin/order*') ? 'active' : '' }}">
                          <p>
                              {{ __('Orders') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.menu.index') }}"
                          class="nav-link {{ request()->is('admin/menu*') ? 'active' : '' }}">
                          <p>
                              {{ __('Manage Menus ') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.manage-attributes.index') }}"
                          class="nav-link {{ request()->is('admin/manage-attributes*') ? 'active' : '' }}">
                          <p>
                              {{ __('Manage Attributes ') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.food-items.index') }}"
                          class="nav-link {{ request()->is('admin/food-items*') ? 'active' : '' }}">
                          <p>
                              {{ __('Manage Food Items ') }}
                          </p>
                      </a>
                  </li>
                  <!-- <li class="nav-item">
          <a href="{{ route('admin.extra-items.index') }}" class="nav-link {{ request()->is('admin/extra-items*') ? 'active' : '' }}">
              <p>
              {{ __('Manage Extra Items ') }}
              </p>
            </a>
          </li> -->
                  <!-- <li class="nav-item">
          <a href="{{ route('admin.banner.index') }}" class="nav-link {{ request()->is('admin/banner*') ? 'active' : '' }}">
              <p>
              {{ __('Manage Banners') }}
              </p>
            </a>
          </li> -->
                  <li class="nav-item">
                      <a href="{{ route('admin.testimonial.index') }}"
                          class="nav-link {{ request()->is('admin/testimonial*') ? 'active' : '' }}">
                          <p>
                              {{ __('Manage Testimonial ') }}
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('admin.manage-pages.index') }}"
                          class="nav-link {{ request()->is('admin/manage-pages*') ? 'active' : '' }}">
                          <p>
                              {{ __('Manage Pages') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.manage-gallery.index') }}"
                          class="nav-link {{ request()->is('admin/manage-gallery*') ? 'active' : '' }}">
                          <p>
                              {{ __('Manage Gallery') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.blog.index') }}"
                          class="nav-link {{ request()->is('admin/blog*') ? 'active' : '' }}">
                          <p>
                              {{ __('Manage Blogs ') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.manage-customer.index') }}"
                          class="nav-link {{ request()->is('admin/manage-customer*') ? 'active' : '' }}">
                          <p>   {{ __('Manage Customer ') }}  </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.booking.index') }}"
                          class="nav-link {{ request()->is('admin/booking*') ? 'active' : '' }}">
                          <p>   {{ __('Manage Booking ') }}   </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.manage-subscribers.index') }}"
                          class="nav-link {{ request()->is('admin/manage-subscribers*') ? 'active' : '' }}">
                          <p>
                              {{ __('Manage Subscriber ') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                <a href="{{ route('admin.manage-coupon.index') }}" class="nav-link {{ request()->is('admin/manage-coupon*') ? 'active' : '' }}">
              <p>
              {{ __('Manage Coupon ') }}
              </p>
            </a>
          </li>
                  <li class="nav-item {{ request()->is('admin/setting*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->is('admin/setting*') ? 'active' : '' }}">
                          <p> {{ __('Site   Setting') }} <i class="right fas fa-angle-left"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.setting.genral') }}"
                                  class="nav-link {{ request()->is('admin/setting/genral') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('General Setting') }}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.setting.referral') }}"
                                 class="nav-link {{ request()->is('admin/setting/referral') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Referral  Setting') }}</p>
                              </a>
                          </li>
                      </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
