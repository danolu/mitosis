<div>
  <div id="top-bar" class="transparent-topbar">
    <div class="container clearfix">
      <div class="row justify-content-between align-items-center">
        <div class="col-12 col-md-auto dark">
          <ul id="top-social">
            <li>
              <a href="https://twitter.com" class="si-twitter" target="_blank">
                <span class="ts-icon"><i class="icon-twitter"></i></span>
                <span class="ts-text">Twitter</span>
              </a>
            </li>
            <li>
              <a href="https://instagram.com" class="si-instagram" target="_blank">
                <span class="ts-icon"><i class="icon-instagram"></i></span>
                <span class="ts-text">instagram</span>
              </a>
            </li>
            <li>
              <a href="mailto:support@mitosis.test" class="si-email3">
                <span class="ts-icon"><i class="icon-envelope-alt"></i></span>
                <span class="ts-text">{{$site->support_email}}</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-12 col-md-auto">
          <div class="top-links on-click">
            <ul class="top-links-container">
              <livewire:site.language />
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <header id="header" class="transparent-header floating-header header-size-md">
    <div id="header-wrap">
      <div class="container">
        <div class="header-row">
          <div id="logo">
            <a href="{{ route('home') }}" wire:navigate class="standard-logo"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a>
            <a href="{{ route('home') }}" wire:navigate class="retina-logo"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a>
          </div>

          <div class="header-misc">
            @if (Auth::guard('user')->check())
            <a wire:navigate href="{{ route('dashboard') }}" class="button button-rounded ml-3 d-none d-sm-block">{{__('Dashboard')}}</a>
            @else
            <a href="{{ route('login') }}" wire:navigate class="button button-rounded ml-3 d-none d-sm-block">{{__('Log In')}}</a>
            @endif
          </div>

          <div id="primary-menu-trigger">
            <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
          </div>

        </div>
      </div>
    </div>
    <div class="header-wrap-clone"></div>
  </header>
</div>
