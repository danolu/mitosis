<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Deleted Users</h6>
        @if (!count($users))
        You have not deleted any user.      
        @else
        <div class="table-responsive">
          <table id="dataTable" class="table table-hover">
            <thead>
              <tr>
                <th>S/N</th>
                <th>User</th>
                <th>Email</th>
                <th>Balance</th>
                <th>Joined</th>
                <th>Deleted</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $k=>$user)
              <tr wire:key="{{$user->id}}">
                <td>{{++$k}}.</td>
                <td>{{$user->user->first_name.' '.$user->user->last_name}}</td>
                <td>{{$user->email}}</td>
                <th>{{$user->balace}}</th>
                <td>{{date("d/m/y", strtotime($user->created_at))}}</td>
                <td>{{date("d/m/y", strtotime($user->deleted_at))}}</td>
                <td></td>
                <td class="text-center">
                  <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" wire:click.prevent="restore({{$user->id}})" href="#"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Restore</span></a>
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