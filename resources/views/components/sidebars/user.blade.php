<nav class="sidebar"> 
    <div class="sidebar-header">
      @persist('sidebar-logo')
      <a href="{{ route('home') }}" class="sidebar-brand">
        <img src="{{ asset('assets/images/logo.png') }}" width="120">
      </a>
      @endpersist
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item {{ active_class(['dashboard']) }}">
          <a href="{{ route('dashboard') }}" class="nav-link" wire:navigate>
            <i class="link-icon" data-feather="home"></i>
            <span class="link-title">{{__('Dashboard')}}</span>
          </a>
        </li> 
        <li class="nav-item {{ active_class(['deposit', 'deposit-crypto', 'deposit-bt']) }}">
          <a href="{{ route('deposit') }}" class="nav-link" wire:navigate>
            <i class="link-icon" data-feather="credit-card"></i>
            <span class="link-title">{{__('Fund Account')}}</span>
          </a>
        </li>    
        <li class="nav-item {{ active_class(['withdrawal', 'withdrawal-details', 'withdraw']) }}">
          <a href="{{ route('withdrawal') }}" class="nav-link" wire:navigate>
            <i class="link-icon" data-feather="dollar-sign"></i>
            <span class="link-title">{{__('Withdraw')}}</span>
          </a>
        </li>          
        <li class="nav-item {{ active_class(['plans', 'invest/*']) }}">
          <a href="{{ route('plans') }}" class="nav-link" wire:navigate>
            <i class="link-icon" data-feather="shopping-bag"></i>
            <span class="link-title">{{__('Invest')}}</span>
          </a>
        </li>
        <li class="nav-item {{ active_class(['investments']) }}">
          <a href="{{ route('investments') }}" class="nav-link" wire:navigate>
            <i class="link-icon" data-feather="trending-up"></i>
            <span class="link-title">{{__('Investments')}}</span>
          </a>
        </li>      
  
        <li class="nav-item nav-category">{{__('Account')}}</li>
        <li class="nav-item {{ active_class(['profile', 'edit-profile']) }}">
          <a href="{{ route('profile') }}" class="nav-link" wire:navigate>
            <i class="link-icon" data-feather="user"></i>
            <span class="link-title">{{__('Profile')}}</span>
          </a>
        </li>
        <li class="nav-item {{ active_class(['referral']) }}">
          <a href="{{ route('referral') }}" class="nav-link" wire:navigate>
            <i class="link-icon" data-feather="share-2"></i>
            <span class="link-title">{{__('Referral')}}</span>
          </a>
        </li> 
        <li class="nav-item {{ active_class(['activity']) }}">
          <a href="{{ route('activity') }}" class="nav-link" wire:navigate>
            <i class="link-icon" data-feather="list"></i>
            <span class="link-title">{{__('Activity')}}</span>
          </a>
        </li> 

        <li class="nav-item">
          <livewire:auth.logout-sidebar /> 
        </li>                     
      </ul>
    </div>
  </nav>