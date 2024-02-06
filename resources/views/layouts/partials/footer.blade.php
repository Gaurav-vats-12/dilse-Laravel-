<footer class="main_footer">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-md-3">
            <div class="quick_links">
              <h3>Quick Links</h3>
              <ul>
                <li><a href="{{ route('aboutus') }}">About Us</a></li>
                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                <li><a href="{{ route('discountandcoupons') }}">Discount and Coupons</a></li>
                <li><a href="{{ url('dilse-foundation-and-donation') }}">Dilse Foundation and Donation</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                  @if (reffrelsetting('referral_status') === '1' ||reffrelsetting('referral_status') === 1)
                      <li><a href="{{ route('user.referral') }}">Referral Program </a></li>
                      @endif
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="footer_cntnt">
              <div class="footer_logo">
                <a href="/">
                <img src="{{ setting('footer_logo') != null ? url('/storage/site/logo/'.setting('footer_logo').'') : asset('frontend/img/footer-logo.svg') }}" alt="" />
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="quick_links">
              <h3>Menu</h3>
              <ul>
            @foreach ( Menuhelper() as $key => $menu )
            @if ($key < 6)
            <li><a href="{{url('menu',$menu->menu_slug)}}" menu_slug ="{{ __(ucfirst( $menu->menu_slug)) }}" class="text-capitalize">{{ __(ucfirst( $menu->menu_name)) }}</a></li>
            @endif
            @endforeach
            </ul>
            </div>
          </div>
        </div>
        <div class="open_hr">
          <h3>Opening Hours</h3>
          <p>{{ setting('opening_hour') != null ?__(setting('opening_hour' ,'Mon – Sun: 11:30 AM – 10:30 PM')) : '' }}</p>
        </div>
        <div class="social_icons_footer">
        <ul>
   <li>
                        <a href="{{ setting('facebook_url') != null ? setting('facebook_url') : '' }}"
                           target="_blank"><img src="{{asset('frontend/img/fb-01.svg') }}" alt=""/></a>
                        </li>
                        <li>
                            <a href="{{ setting('instagram_url') != null ? setting('instagram_url') : '' }}"
                               target="_blank"><img src="{{asset('frontend/img/insta-1.svg') }}" alt=""/></a>
                        </li>
                        <li>
                            <a href="https://www.blogto.com/restaurants/dil-se-indian-toronto/" target="_blank"><img
                                        src="{{asset('frontend/img/blog_to cart.svg') }}" alt=""/></a>
                        </li>
                    </ul>
            </div>
      </div>

      <div class="copy_right">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
          <div class="copy_right_txt">
            <p>{{ setting('copyright_text') != null ? __(setting('copyright_text')) : '' }}</p>

          </div>
</div>
<div class="col-md-4">
          <div class="copyright_links">
              <ul>
                <li><a href="{{url('terms-and-conditions')}}">Term and Condition</a></li>
                <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-4">
          <div class="copyright_links">
          <ul>
            @if (setting('footer_image_2')!=null)
            @foreach(explode(',', setting('footer_image_2')) as $info)
            <li><img src="{{ url('/storage/site/footer/otherImage/'.$info.'')}}" alt="{{$info}}" /></li>
              @endforeach
            @else
             <li><img src="{{asset('frontend/img/logo-footer-1.png') }}" alt="" /></li>
                <li><img src="{{asset('frontend/img/logo-footer-2.png') }}" alt="" /></li>
                <li><img src="{{asset('frontend/img/logo-footer-3.png') }}" alt="" /></li>
                <li><img src="{{asset('frontend/img/logo-footer-4.png') }}" alt="" /></li>
                <li><img src="{{asset('frontend/img/logo-footer-5.png') }}" alt="" /></li>

            @endif
            </ul>
            </div>
          </div>
          <div class="copy_right_txt dd_bottom">
            <p>Designed and Developed By <a href="https://www.exoticaitsolutions.com/" target="_blank">Exotica It Solutions Private Limited</a></p>
          </div>
        </div>
        </div>
      </div>

    </footer>

  @include('layouts.partials.footer_scripts')
  </body>
</html>
