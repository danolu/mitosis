<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title fw-semibold">Investors</h6>
        @if (count($users) < 1)
          <p> There are no registered users on the platform.
        @else
        <div class="table-responsive">
          <table id="" class="table table-hover">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Username</th>
                <th>Balance</th>
                <th>Profits</th>
                <th>Joined</th>
                <th>Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $k=>$user)
              <tr wire:key="{{ $user->id }}">
                <td>{{++$k}}.</td>
                <td><a wire:navigate href="{{route('user.manage', $user->id)}}">{{$user->first_name.' '.$user->last_name}}</a></td>
                <td>{{$user->username}}</td>
                <td>{{$currency->symbol.number_format($user->balance)}}</td>
                <td>{{$currency->symbol.number_format($user->profits)}}</td>
                <td>{{date("d/m/Y", strtotime($user->created_at))}}</td>
                @if($user->status==1)
                <td class="text-success">Active</td>
                @else
                <td class="text-danger">Suspended</td>
                @endif
                <td class="text-center">
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="icon-lg text-muted" data-feather="more-vertical"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item d-flex align-items-center" wire:navigate href="{{route('user.manage', $user->id)}}">
                        <i data-feather="edit-3" class="icon-sm me-2"></i> 
                        <span class="">Manage</span>
                      </a>
                      @if($user->status==1)
                      <a class="dropdown-item d-flex align-items-center" href="#" wire:click="suspend($user->id)">
                        <i data-feather="x-square" class="icon-sm me-2"></i> <span class="">Suspend</span>
                      </a>
                      @else
                      <a class="dropdown-item d-flex align-items-center" href="#" wire:click="restore($user->id)">
                        <i data-feather="x-square" class="icon-sm me-2"></i> <span class="">Unsuspend</span>
                      </a>
                      @endif
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>