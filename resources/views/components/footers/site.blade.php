<footer id="footer" class="border-0 bg-white">
    <div class="container">
      <div class="footer-widgets-wrap pb-5 clearfix">
        <div class="row col-mb-50">
          <div class="col-md-4 offset-md-4">
            <div class="widget clearfix">
              <div class="row clearfix">
                <div class="col-12">
                  <div class="feature-box fbox-plain fbox-sm align-items-center">
                    <div class="fbox-icon">
                      <i class="icon-envelope text-dark"></i>
                    </div>
                    <div class="fbox-content">
                      <span class="text-muted">{{__('Email Us')}}:</span><br>
                      <h3 class="nott ls0 font-weight-semibold">{{$site->support_email}}</h3>
                    </div>
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <div class="feature-box fbox-plain fbox-sm align-items-center">
                    <div class="fbox-icon">
                      <i class="icon-phone3 text-dark"></i>
                    </div>
                    <div class="fbox-content">
                      <span class="text-muted">{{__('Call Us')}}:</span><br>
                      <h3 class="nott ls0 font-weight-semibold">{{$site->phone}}<br>{{$site->alt_phone}}</h3>                      
                    </div>
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <div class="feature-box fbox-plain fbox-sm align-items-center">
                    <div class="fbox-icon">
                      <i class="icon-location text-dark"></i>
                    </div>
                    <div class="fbox-content">
                      <span class="text-muted">{{__('Visit Us')}}:</span><br>
                      <h3 class="nott ls0 font-weight-semibold">{{$site->address}}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="widget">
              <div class="row col-mb-30">
                <div class="col-lg-6 col-md-12 col-6">
                  <a href="https://twitter.com" target="_blank" class="social-icon si-dark si-colored si-twitter mb-0" style="margin-right: 10px;">
                    <i class="icon-twitter"></i>
                    <i class="icon-twitter"></i>
                  </a>
                  <a href="#" target="_blank" class="text-dark"><small style="display: block; margin-top: 3px;"><strong>{{__('Follow us')}}</strong><br>on Twitter</small></a>
                </div>
                <div class="col-lg-6 col-md-12 col-6">
                  <a href="https://instagram.com" target="_blank" class="social-icon si-dark si-colored si-instagram mb-0" style="margin-right: 10px;">
                    <i class="icon-instagram"></i>
                    <i class="icon-instagram"></i>
                  </a>
                  <a href="#" target="_blank" class="text-dark"><small style="display: block; margin-top: 3px;"><strong>{{__('Follow us')}}</strong><br>on Instagram</small></a>
                </div>
                <div class="col-lg-6 col-md-12 col-6">
                  <a href="https://linkedin.com" target="_blank" class="social-icon si-dark si-colored si-linkedin mb-0" style="margin-right: 10px;">
                    <i class="icon-linkedin"></i>
                    <i class="icon-linkedin"></i>
                  </a>
                  <a href="https://t.me" target="_blank" class="text-dark"><small style="display: block; margin-top: 3px;"><strong>{{__('Follow us')}}</strong><br>on LinkedIn</small></a>
                </div>
                <div class="col-lg-6 col-md-12 col-6">
                  <a href="https://facebook.com" target="_blank" class="social-icon si-dark si-colored si-facebook mb-0" style="margin-right: 10px;">
                    <i class="icon-facebook"></i>
                    <i class="icon-facebook"></i>
                  </a>
                  <a href="https://t.me" target="_blank" class="text-dark"><small style="display: block; margin-top: 3px;"><strong>{{__('Follow us')}}</strong><br>on Facebook</small></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="copyrights">
      <div class="container clearfix">
        <div class="mb-30 text-center">
            &copy; {{date('Y')}} {{$site->name}}.
        </div>
      </div>
    </div>
  </footer>