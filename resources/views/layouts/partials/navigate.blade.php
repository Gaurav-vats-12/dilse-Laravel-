<header class="main_header">
      <div class="top_header">
        <div class="container">
          <div class="info_bx">
            <div class="contact_info">
              <ul>
                <li>
                  <a href="">
                    <div class="contact_info_txt">
                      <div class="contact_info_img">
                        <img src="{{asset('frontend/img/phone-o1.png') }}" alt="" />
                      </div>
                      <p>416-532-4141, 416-534-6344</p>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="">
                    <div class="contact_info_txt">
                      <div class="contact_info_img">
                        <img src="{{asset('frontend/img/phone-o1.png') }}" alt="" />
                      </div>
                      <p>416-532-4141, 416-534-6344</p>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
            <div class="social_icons">
              <ul>
                <li></li>
                  <a href="#"><img src="{{asset('frontend/img/fb-01.png') }}" alt="" /></a>
                </li>
                <li>
                  <a href="#"><img src="{{asset('frontend/img/fb-01.png')}}" alt="" /></a>
                </li>
                <li>
                  <a href="#"><img src="{{asset('frontend/img/fb-01.png')}}" alt="" /></a>
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
                <li><a href="{{ route('home')}}">Home</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">About Us</a></li>
              </ul>
            </div>
            <div class="site_logo">
              <img src="{{ setting('logo') != null ? url('/storage/site/logo/'.setting('logo').'') : '' }}" alt="">
            </div>
            <div class="menu_left menu_right">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">About Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
