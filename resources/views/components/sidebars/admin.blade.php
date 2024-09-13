<nav class="sidebar">
    <div class="sidebar-header">
      <a href="{{ route('home') }}" class="sidebar-brand">
        <img src="{{ asset('assets/images/logo.png') }}" width="120">
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item {{ active_class(['admin/dashboard']) }}">
          <a wire:navigate href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="monitor"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item {{ active_class(['admin/users', 'admin/manage/user/*']) }}">
          <a wire:navigate href="{{ route('users') }}" class="nav-link">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Investors</span>
          </a>
        </li>            
        <li class="nav-item {{ active_class(['admin/deposits']) }}">
          <a class="nav-link" wire:navigate href="{{ route('admin.deposits') }}">
            <i class="link-icon" data-feather="credit-card"></i>
            <span class="link-title">Deposits</span>
          </a>
        </li>    
        <li class="nav-item {{ active_class(['admin/payouts']) }}">
          <a wire:navigate href="{{ route('payouts.log') }}" class="nav-link">
            <i class="link-icon" data-feather="dollar-sign"></i>
            <span class="link-title">Payouts</span>
          </a>
        </li> 
        <li class="nav-item {{ active_class(['admin/investments']) }}">
          <a wire:navigate href="{{ route('admin.investments') }}" class="nav-link">
            <i class="link-icon" data-feather="trending-up"></i>
            <span class="link-title">Investments</span>
          </a>
        </li> 
        <li class="nav-item {{ active_class(['admin/investments/active']) }}">
          <a wire:navigate href="{{ route('investments.active') }}" class="nav-link">
            <i class="link-icon" data-feather="battery-charging"></i>
            <span class="link-title">Active Investments</span>
          </a>
        </li> 
        <li class="nav-item {{ active_class(['admin/investments/completed']) }}">
          <a wire:navigate href="{{ route('investments.completed') }}" class="nav-link">
            <i class="link-icon" data-feather="circle"></i>
            <span class="link-title">Completed Investments</span>
          </a>
        </li> 
               
        <li class="nav-item {{ active_class(['admin/plans']) }}">
          <a wire:navigate href="{{ route('admin.plans') }}" class="nav-link">
            <i class="link-icon" data-feather="shopping-bag"></i>
            <span class="link-title">Plans</span>
          </a>
        </li>
        <li class="nav-item {{ active_class(['admin/referral']) }}">
          <a wire:navigate href="{{ route('referrals') }}" class="nav-link">
            <i class="link-icon" data-feather="share-2"></i>
            <span class="link-title">Referrals</span>
          </a>
        </li>  
        <li class="nav-item {{ active_class(['admin/newsletter/*']) }}">
          <a wire:navigate href="{{ route('newsletter') }}" class="nav-link">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Newsletter</span>
          </a>
        </li>                                    
        <li class="nav-item nav-category">Administator</li>
        <li class="nav-item {{ active_class(['admin/profile']) }}">
          <a wire:navigate href="{{ route('admin.account') }}" class="nav-link">
            <i class="link-icon" data-feather="user"></i>
            <span class="link-title">Profile</span>
          </a>
        </li> 
        <li class="nav-item {{ active_class(['admin/settings']) }}">
          <a wire:navigate href="{{ route('settings') }}" class="nav-link">
            <i class="link-icon" data-feather="settings"></i>
            <span class="link-title">Settings</span>
          </a>
        </li> 
        <livewire:admin.auth.adminsidebarlogout />                         
      </ul>
    </div>
  </nav>