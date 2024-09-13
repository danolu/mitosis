<nav class="navbar">
    <a href="#" class="sidebar-toggler">
      <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="wd-30 ht-30 rounded-circle" src="{{ asset('assets/images/user.svg') }}" alt="avatar">
          </a>
          <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
            <ul class="list-unstyled p-1">
              <li class="dropdown-item py-2">
                <a href="{{ route('admin.account') }}" wire:navigate class="text-body ms-0">
                  <i class="me-2 icon-md" data-feather="user"></i>
                  <span>{{__('Profile')}}</span>
                </a>
              </li>
              <livewire:admin.auth.adminlogout />
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </nav>