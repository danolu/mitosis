<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i data-feather="bell"></i>
    @if (count($notifs) > 0)
    <div class="indicator">
      <div class="circle"></div>
    </div>
    @endif
  </a>
  <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
      @if (count($notifs) === 1)
      <p>{{__('unread notification', ['value' => count($notifs)])}}</p>
      @else
      <p>{{__('unread notifications', ['value' => count($notifs)])}}</p>
      @endif
      @if (count($notifs) > 0)
      <a href="#" wire:click.prevent="clear" class="text-muted">{{__('Dismiss all')}}</a>
      @endif
    </div>

    @if (count($notifs) > 0)
    <div class="py-2">
      @foreach ($notifs as $notif)
      <a href="#" wire:click.prevent="link({{$notif->id}})" class="dropdown-item d-flex align-items-center" wire:key="{{ $notif->id }}">
        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
          <i class="icon-sm text-white" data-feather="{{$notif->icon ? $notif->icon : "bell"}}"></i>
        </div>
        <p>{{__($notif->activity)}}</p>
      </a>
      <div class="d-flex align-items-center justify-content-between">
        <p class="ms-3 tx-12 text-secondary">{{ \Carbon\Carbon::now()->longAbsoluteDiffForHumans($notif->created_at);}} ago</p>
        <div class="me-3">
          <a href="#" wire:click.prevent="dismiss({{$notif->id}})">{{__('Dismiss')}}</a>
        </div>
      </div>
      @endforeach
    </div>
    @endif
    
    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
      <a href="{{route('activity')}}" wire:navigate>{{__('View activity log')}}</a>
    </div>
  </div>
</li>