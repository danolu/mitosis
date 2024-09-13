<nav class="navbar">
    <a href="#" class="sidebar-toggler">
      <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
      <ul class="navbar-nav">
        <livewire:user-language />
        <livewire:user-notifications />
        <livewire:user-balance />
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if(!$user->profile_photo)
            <img class="wd-30 ht-30 rounded-circle" src="{{ asset('assets/images/user.svg') }}">
            @else
            <img class="wd-30 ht-30 rounded-circle" src="{{ asset($user->profile_photo) }}" alt="Avatar">
            @endif
          </a>
          <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
              <div class="figure mb-3">
                @if(!$user->profile_photo)
                  <img class="wd-80 ht-80 rounded-circle" src="{{ asset('assets/images/user.svg') }}" alt="Investor's avatar">
                @else
                  <img class="wd-80 ht-80 rounded-circle" src="{{ asset($user->profile_photo) }}" alt="Investor's avatar">
                @endif
              </div>
              <div class="info text-center">
                <p class="tx-16 name fw-bolder mb-0">{{$user->first_name.' '.$user->last_name}}</p>
                <p class="tx-12 email text-muted mb-3">{{__('Investor')}}</p>
              </div>
            </div>
            <ul class="list-unstyled p-1">
              <li class="dropdown-item py-2">
                <a href="{{ route('profile') }}" wire:navigate class="text-body ms-0">
                  <i class="me-2 icon-md" data-feather="user"></i>
                  <span>{{__('Profile')}}</span>
                </a>
              </li>
              <livewire:auth.logout />
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </nav>