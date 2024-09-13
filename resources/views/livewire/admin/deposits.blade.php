<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title fw-semibold">Deposit Log</h6>
        @if (count($deposits) < 1)
        <p>There are no deposits in records.</p>
        @else
        <div class="table-responsive">
          <table id="dataTable" class="table table-hover">
            <thead>
              <tr>
                <th>SN</th>
                <th>User</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Date</th>
                <th>Status</th>
                <th class="text-center">Wallet/Receipt</th>
                <th>Ref</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($deposits as $k=>$deposit)
              <tr wire:key="{{$deposit->id}}">
                <td>{{++$k}}.</td>
                <td><a href="{{route('user.manage', $deposit->user_id)}}">{{$deposit->user->first_name.' '.$deposit->user->last_name}}</a></td>
                <td>{{$currency->symbol.number_format($deposit->amount)}}</td>
                <td>{{$deposit->method}}</td>
                <td>{{date("d/m/y h:i:A", strtotime($deposit->created_at))}}</td>
                @if($deposit->status===0)
                <td class="text-primary">Pending</td>
                @elseif($deposit->status==1)
                <td class="text-success">Approved</td>
                @else
                <td class="text-danger">Declined</td>
                @endif
                @if($deposit->wallet_address)
                <td>{{$deposit->wallet_address}}</td>
                @else
                <td class="text-center">
                  <a data-bs-toggle="modal" data-bs-target="#receipt{{$deposit->id}}">
                    <i data-feather="camera" class="icon-md me-2"></i>
                  </a>
                </td>
                @endif
                <td>{{$deposit->ref}}</td>
                <td class="text-center">
                  <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if($deposit->status===0) 
                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#approve{{$deposit->id}}"><i data-feather="check-square" class="icon-sm me-2"></i> <span class="">Approve</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#decline{{$deposit->id}}"><i data-feather="x-square" class="icon-sm me-2"></i> <span class="">Decline</span></a>
                    @endif
                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#delete{{$deposit->id}}"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  </div>
                  </div>
                </td>
              </tr>
              <div class="modal fade" id="approve{{$deposit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <h6>Are you sure you want to approve this deposit?</h6>
                    </div>  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <a wire:click.prevent="approve({{$deposit->id}})" href="#" class="btn btn-primary">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="decline{{$deposit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <h6>Are you sure you want to decline this deposit?</h6>
                    </div>  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <a wire:click.prevent="decline({{$deposit->id}})" href="#" class="btn btn-warning">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="delete{{$deposit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <h6>Are you sure you want to delete this deposit?</h6>
                    </div>  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <a wire:click.prevent="destroy({{$deposit->id}})" href="#" class="btn btn-danger">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
              @if ($deposit->receipt)
              <div class="modal fade" id="receipt{{$deposit->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-body text-center">
                      <img src="{{ asset($deposit->receipt)}}" width="500">
                    </div>  
                  </div>
                </div>
              </div>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>