<footer class="main_footer">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-md-3">
            <div class="quick_links">
              <h3>Quick Links</h3>
              <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Gift Card</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-5">
            <div class="footer_cntnt">
              <div class="footer_logo">
                <img src="{{ setting('footer_logo') != null ? url('/storage/site/logo/'.setting('footer_logo').'') : '' }}" alt="" />
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="quick_links">
              <h3>Menu</h3>
              <ul>
                <li><a href="#">Appetizers</a></li>
                <li><a href="#">Tandoori</a></li>
                <li><a href="#">Vegeterian</a></li>
                <li><a href="#">Non Veg</a></li>
                <li><a href="#">Basmati Rice</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="open_hr">
          <h3>Opening Hours</h3>
          <p>{{ setting('opening_hour') != null ?__(setting('opening_hour')) : '' }}</p>
        </div>
      </div>

      <div class="copy_right">
        <div class="container">
          <div class="copy_right_txt">
            <p>{{ setting('copyright_text') != null ? __(setting('copyright_text')) : '' }}</p>
            <ul>
              <li><img src="{{asset('frontend/img/logo-footer-1.png')}}" alt="" /></li>
              <li><img src="{{asset('frontend/img/logo-footer-2.png')}}" alt="" /></li>
              <li><img src="{{asset('frontend/img/logo-footer-3.png')}}" alt="" /></li>
              <li><img src="{{asset('frontend/img/logo-footer-4.png')}}" alt="" /></li>
              <li><img src="{{asset('frontend/img/logo-footer-5.png')}}" alt="" /></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  @include('layouts.partials.footer_scripts')
