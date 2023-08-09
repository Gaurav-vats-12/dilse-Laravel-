
<header class="main_header {{ (request()->is('user*')) ? 'signup_main_header' : '' }}">
      <div class="top_header">
        <div class="container">
          <div class="info_bx">
            <div class="contact_info">
              <ul>
                <li>
                  <a href="tel:{{ setting('phone') != null ? setting('phone') : '' }}">
                    <div class="contact_info_txt">
                      <div class="contact_info_img">
                        <img src="{{asset('frontend/img/phone-o1.png') }}" alt="" />
                      </div>
                      <p>{{ setting('phone') != null ? setting('phone') : '' }}</p>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="mailto:{{ setting('site_email') != null ? setting('site_email') : '' }}">
                    <div class="contact_info_txt">
                      <div class="contact_info_img">
                        <img src="{{asset('frontend/img/mail.png') }}" alt="" />
                      </div>
                      <p>{{ setting('site_email') != null ? setting('site_email') : '' }}</p>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
            <div class="social_icons">
              <ul>
                <li></li>
                  <a href="{{ setting('facebook_url') != null ? setting('facebook_url') : '' }}" target ="_blank"><img src="{{asset('frontend/img/fb-01.png') }}" alt="" /></a>
                </li>
                <li>
                  <a href="{{ setting('instagram_url') != null ? setting('instagram_url') : '' }}" target ="_blank"><img src="{{asset('frontend/img/insta-1.png') }}" alt="" /></a>
                </li>
                <li>
                  <a href="{{ setting('twitter_url') != null ? setting('twitter_url') : '' }}" target ="_blank" ><img src="{{asset('frontend/img/twi.png') }}" alt="" /></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="btm_header">
        <div class="container">
          <div class="btm_header_flx">
            <div class="menu_left">
              <ul>
                <li><a href="{{ url('/')}}">Home</a></li>
                <li><a href="{{ route('menu' ,'appetizers') }}">Menu</a></li>
                <li><a href="{{url('about-us')}}">About Us</a></li>
              </ul>
            </div>
            <div class="site_logo">
                <!--<img src="assets/img/site-logo-dil.png" alt="">-->
                <a href="{{ url('/')}}"><img src="{{ setting('logo') != null ? url('/storage/site/logo/'.setting('logo').'') : asset('frontend/img/site-logo-dil.png')  }}" alt="">
                </a>
            </div>
            <div class="menu_left menu_right">
              <ul>
               <li><a href="{{url('gallery')}}">Gallery</a></li>
               <li><a href="{{url('contact-us')}}">Contact Us</a></li>
               <li><a href="{{url('blog')}}">Blog</a></li>
               <li><a href="{{url('cart')}}" class="cart_item"><img src="{{asset('frontend/img/carts__icon.svg')}}"/><span class="cart_count">5</span></a></li> 
              @if(Request::is('/'))
                <li><a href="#" class="theme_btn">Book a table</a></li>
              @else
                <li><a href="#" class="theme_btn">Read More</a></li>
              @endif
              </ul>

            </div>
          </div>
        </div>
      </div>
    </header>
