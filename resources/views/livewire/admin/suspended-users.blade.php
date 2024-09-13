<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Suspended Investors</h6>
        @if (count($users) <1)
          <p>There are no suspended investors.
        @else
        <div class="table-responsive">
          <table id="dataTable" class="table table-hover">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Balance</th>
                <th>Profit</th>
                <th>Joined</th>
                <th>Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $k=>$user)
              <tr>
                <td>{{++$k}}.</td>
                <td>{{$user->first_name.' '.$user->last_name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
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
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" wire:submit.prevent="manage({{$user->id}})" href="#">
                    <i data-feather="check-square" class="icon-sm mr-2"></i> 
                    <span class="">Manage</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" wire:submit.prevent="restore({{$user->id}})" href="#">
                    <i data-feather="x-square" class="icon-sm mr-2"></i> <span class="">Unsuspend</span>
                  </a>
                  <a data-toggle="modal" data-target="#{{$user->id}}delete" class="dropdown-item d-flex align-items-center">
                    <i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span>
                  </a>
                  </div>
                  </div>
                </td>
              </tr>
              <div id="{{$user->id}}delete" class="modal fade" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">   
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">
                              <h6 class="font-weight-semibold">Are you sure you want to delete this user?</h6>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
                              <a wire:submit.prevent="destroy({{$user->id}})" href="#" class="btn bg-danger">Proceed</a>
                          </div>
                      </div>
                  </div>
              </div>
              <div id="{{$user->id}}unsuspend" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">   
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="font-weight-semibold">Are you sure you want to unsuspend this user?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
                            <a wire:submit.prevent="unsuspend({{$user->id}})" href="#" class="btn bg-danger">Proceed</a>
                        </div>
                    </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>