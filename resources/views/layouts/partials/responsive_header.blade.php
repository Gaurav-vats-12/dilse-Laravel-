<header class="main_header responsi_header">
    <div class="top_header">
      <div class="container">
        <div class="info_bx">
          <div class="contact_info">
            <ul>
              <li>
                <a href="tel:416-532-4141,416-534-6344">
                  <div class="contact_info_txt">
                    <div class="contact_info_img">
                    <img src="{{asset('frontend/img/phone-o1.png') }}" alt="phone-o1.png"/>
                    </div>
                    <p>{{ setting('phone') != null ? setting('phone') : '' }}</p>
                  </div>
                </a>
              </li>
              <li>
              <a href="mailto:{{ setting('site_email') != null ? setting('site_email') : '' }}">
                                <div class="contact_info_txt">
                                    <div class="contact_info_img">
                                        <img src="{{asset('frontend/img/mail.png') }}" alt="mail.png"/>
                                    </div>
                                    <p>{{ setting('site_email') != null ? setting('site_email') : '' }}</p>
                                </div>
                            </a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
    <div class="btm_header">
      <div class="container">
        <div class="btm_header_flx">

          <div class="site_logo">
            <a href="{{ url('/')}}"><img src="{{ setting('logo') != null ? url('/storage/site/logo/'.setting('logo').'') : asset('frontend/img/dil-se-logo.svg')  }}"  alt="dil-se-logo.svg"> </a>
          </div>
          <div class="menu_left menu_right">
            <ul>
            @if(Auth::guard('user')->check())
                        <li class="name_drop_down">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> {!! Str::limit(strip_tags(Auth::guard('user')->user()->name), 12) !!} </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ route('user.profile.edit') }}">Profile</a> </li>
                                        <li><a class="dropdown-item" href="{{ route('user.order') }}"> Order </a></li>
                                        <li> <form method="POST" action="{{ route('user.logout') }}">  @csrf <x-responsive-nav-link :href="route('user.logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item"> <span> {{ __('Log Out') }}</span>  </form> </x-responsive-nav-link></li>
                                    </ul>
                                </div>
                    </li>                           @else
                        <li class="name_drop_down"><a class="login_header" href="{{route('user.login')}}"> Login </a></li>
                        @endif

            <li><a href="{{ url('/')}}">Home</a></li>
                        <li><a href="{{url('about-us')}}">About Us</a></li>
                        <li><a href="{{url('blog')}}">Blog</a></li>
                        <li><a href="{{ route('menu','appetizers') }}">Menu</a></li>
                        <li><a href="{{url('gallery')}}">Gallery</a></li>
                        <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                        <li>
                        <select class="select_location" name="select_location" id="select_location" ajax_value ="{{ route('cart.update_details')}}" location_Type="location">
                        <option value="Toronto" {{ session('update_location') =='Toronto'? 'selected' : '' }}>Toronto</option>
                        <option value="Brampton" {{ session('update_location') =='Brampton'? 'selected' : '' }}>Brampton</option>
                            </select>
                </li>
                <li>
                                <div class="contact_info_txt">
                                    <div class="contact_info_img">
                                        <img src="{{asset('frontend/img/phone-o1.png') }}" alt=""/>
                                    </div>
                                    <a href="tel:{{ setting('phone') != null ? setting('phone') : '' }}" style="padding-left: 0;">
                                    <p>{{ setting('phone') != null ? setting('phone') : '' }}</p>
                                    </a>|<a href="tel:416-534-6344"><p>416-534-6344</p></a>    
                                </div>
                           
                        </li>
                        <li>
                            <a href="mailto:{{ setting('site_email') != null ? setting('site_email') : '' }}" style="padding: 0;">
                                <div class="contact_info_txt">
                                    <div class="contact_info_img">
                                        <img src="{{asset('frontend/img/mail.png') }}" alt="mail.png"/>
                                    </div>
                                    <p style="color: #f8d385;">{{ setting('site_email') != null ? setting('site_email') : '' }}</p>
                                </div>
                            </a>
                        </li>
            </ul>

          </div>
          <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
        </div>
          <li class="cart_responseive">
              <a href="{{url('cart')}}" class="cart_item"><img src="{{asset('frontend/img/cart-1.png')}}"/><span class="cart_count">{{ count((array) session('cart')) }}</span></a>
          </li>

      </div>
    </div>
  </header>
