<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title fw-semibold">PAYOUT LOG</h6>
        @if (count($payouts) < 1)
          <p>There are no payouts in record.</p>
        @else
        <div class="table-responsive">
          <table id="dataTable" class="table table-hover">
            <thead>
              <tr>
                <th>SN</th>
                <th>User</th>
                <th>Amount</th>
                <th>Wallet Address</th>
                <th>Date</th>
                <th>Status</th>
                <th>Ref</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($payouts as $k=>$payout)
              <tr wire:key="{{$payout->id}}">
                <td>{{++$k}}.</td>
                <td>
                  <a wire:navigate href="{{route("user.manage", $payout->user_id)}}">
                    {{$payout->user->first_name.' '.$payout->user->last_name}}
                  </a>
                </td>
                <td>{{$currency->symbol.number_format($payout->amount)}}</td>
                <td>{{$payout->user->bank_name}}</td>
                <td>{{date("d/m/y h:i:A", strtotime($payout->created_at))}}</td>
                @if($payout->status===0)
                <td class="text-primary">Pending</td>
                @elseif($payout->status===1)
                <td class="text-success">Approved</td>
                @else
                <td class="text-danger">Declined</td>
                @endif
                <td>{{$payout->ref}}</td>
                <td class="text-center">
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-vertical"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      @if($payout->status===0)  
                      <a class="dropdown-item d-flex align-items-center" wire:click.prevent="approve({{$payout->id}})" href="#">
                        <i data-feather="check-square" class="icon-sm me-2"></i> 
                        <span class="">Approve</span>
                      </a>
                      <a class="dropdown-item d-flex align-items-center" wire:click.prevent="decline({{$payout->id}})" href="#">
                        <i data-feather="x-square" class="icon-sm me-2"></i> 
                        <span class="">Decline</span>
                      </a>
                      @else
                      <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#delete{{$payout->id}}"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                      @endif
                    </div>
                  </div>
                </td>
              </tr>
              <div class="modal fade" id="approve{{$payout->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <h6>Are you sure you want to approve this payout?</h6>
                    </div>  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a wire:click.prevent="approve({{$payout->id}})" href="#" class="btn btn-primary">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="decline{{$payout->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <h6>Are you sure you want to decline this payout?</h6>
                    </div>  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a wire:click.prevent="decline({{$payout->id}})" href="#" class="btn btn-warning">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="delete{{$payout->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <h6>Are you sure you want to delete this payout?</h6>
                    </div>  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a wire:click.prevent="destroy({{$payout->id}})" href="#" class="btn btn-danger">Delete</a>
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