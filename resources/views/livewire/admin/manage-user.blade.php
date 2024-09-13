<div>
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a wire:navigate href="{{route('users')}}">Investors</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$user->first_name.' '.$user->last_name}}</li>
    </ol>
  </nav>
<div class="profile-page">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="profile-header card mt-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
              @if(!$user->profile_photo)
              <img class="profile-pic rounded-circle" src="{{ asset('assets/images/user.svg') }}" height="100">
              @else
              <img class="profile-pic rounded-circle" src="{{ asset($user->profile_photo) }}" height="100">
              @endif
              <div class="ms-3">
                <h4 class="fw-semibold">{{$user->first_name.' '.$user->last_name}}</h4>
                <p class="mt-1 text-secondary">&nbsp; {{'@'.$user->username}}</p>
                <h6 class="mt-2 text-secondary">Joined {{date("M Y", strtotime($user->created_at))}}</h6>
              </div>
            </div>
            <div class="me-2">
              <a wire:navigate href="{{route('email', $user)}}">
                <button class="btn btn-info btn-icon-text btn-edit-profile">
                <i data-feather="mail" class="btn-icon-prepend"></i> Email
                </button>
              </a>
              @if($user->status==1)
              <a wire:click.prevent="suspend({{$user}})" href="#">
                <button class="btn btn-warning btn-icon-text btn-edit-profile">
                  <i data-feather="flag" class="btn-icon-prepend"></i> Suspend
                </button> 
              </a> 
              @else
              <a wire:click.prevent="unsuspend({{$user}})" href="#">
                <button class="btn btn-secondary btn-icon-text btn-edit-profile">
                  <i data-feather="mic" class="btn-icon-prepend"></i> Unsuspend
                </button> 
              </a>
              @endif
              <a href="#" data-bs-toggle="modal" data-bs-target="#delAccount">
                <button class="btn btn-danger btn-icon-text btn-edit-profile">
                  <i data-feather="trash-2" class="btn-icon-prepend"></i> Delete
                </button> 
              </a>             
            </div>
          </div>  
          <div class="d-flex justify-content-end align-items-center mt-4">
            
            <div class="me-2">
              <a wire:navigate href="{{route('user.manage.deposits', $user)}}">
                <button class="btn btn-light btn-icon-text btn-edit-profile">
                <i data-feather="credit-card" class="btn-icon-prepend"></i> Deposits 
                </button>
              </a>

              <a wire:navigate href="{{route('user.manage.investments', $user)}}">
                <button class="btn btn-light btn-icon-text btn-edit-profile">
                  <i data-feather="trending-up" class="btn-icon-prepend"></i> Investments
                </button> 
              </a> 
              <a wire:navigate href="{{route('user.manage.payouts', $user)}}">
                <button class="btn btn-light btn-icon-text btn-edit-profile">
                  <i data-feather="dollar-sign" class="btn-icon-prepend"></i> Payouts
                </button> 
              </a>
              <a wire:navigate href="{{route('user.manage.referrals', $user)}}">
                <button class="btn btn-light btn-icon-text btn-edit-profile">
                  <i data-feather="dollar-sign" class="btn-icon-prepend"></i> Referral Earnings
                </button> 
              </a>
            
            </div>
          </div>  
          <div class="modal fade" id="delAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Deletion Confirmation</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                  </button>
                </div>
                <form wire:submit="destroy({{$user}})">
                <div class="modal-body">
                  <h5>Are you sure you want to delete this user's account?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                </form>
              </div>
            </div>
          </div>           
          <hr class="mt-4">
          <h5 class="m-2 fw-semibold">Personal Information</h5>
          <hr>
          <div class="mt-4 profile-body">
            <div class="align-items-center m-2">
              <h6 class="card-title fw-semibold mb-2 mt-4">Email</h6>
              <p>{{$user->email}}</p>
              <h6 class="card-title fw-semibold mb-2 mt-4">Phone</h6>
              <p>{{$user->phone}}</p>
              <h6 class="card-title fw-semibold mb-2 mt-4">Address</h6>
              <p>{{$user->address}}</p>
              @if($user->bank_name && $user->bank_account_number)
              <h6 class="card-title fw-semibold mb-2 mt-4">Bank</h6>
              <p>{{$user->bank_name}}</p>
              <h6 class="card-title fw-semibold mb-2 mt-4">Bank Account Number</h6>
              <p>{{$user->bank_account_number}}</p>
              @endif
              <h6 class="card-title fw-semibold mb-2 mt-4">Uninvested balance</h6>
              <p>{{$currency->symbol.number_format($user->balance)}} <a href="#" class="ms-4" data-bs-toggle="modal" data-bs-target="#updateBalance">Update</button></a>
              <h6 class="card-title fw-semibold mb-2 mt-4">Last Account Activity</h6>
              <p>{{date("d/m/Y H:i:a", strtotime($user->last_login))}}</p>
            </div>
          </div>
          <hr class="mt-4">
          <h5 class="m-2 fw-semibold">Statistics</h5>
          <hr>
          <div class="mt-4 profile-body">
            <div class="align-items-center m-2">
              <h6 class="card-title fw-semibold mb-2 mt-4">Number of Investments (Total)</h6>
              <p>{{$total_investments}}</p>
              @if($total_investments>0)
              <h6 class="card-title fw-semibold mb-2 mt-4">Amount Invested (Total)</h6>
              <p>{{$currency->symbol.number_format($total_invested)}}</p>
              <h6 class="card-title fw-semibold mb-2 mt-4">Profits Accrued</h6>
              <p>{{$currency->symbol.number_format($user->profits)}}</p>
              <h6 class="card-title fw-semibold mb-2 mt-4">Highest Capital</h6>
              <p>{{$highest_capital->capital}}</p>
              <h6 class="card-title fw-semibold mb-2 mt-4">Active Investments</h6>
              <p>{{$active_investments}}</p>
              @endif
              @if($referees>0)
              <h6 class="card-title fw-semibold mb-2 mt-4">Investors Referred</h6>
              <p>{{$referees}}</p>
              <h6 class="card-title fw-semibold mb-2 mt-4">Referral Earnings</h6>
              <p>{{$currency->symbol.number_format($ref_earnings)}}</p>
              @endif
            </div>
          </div>
          <div class="modal fade" id="updateBalance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Account Balance Update</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
                </div>
                <div class="modal-body">
                  <form wire:submit="updateBalance({{$user->id}})">
                    <div class="form-group">
                      <label for="balance">{{$user->first_name.' '.$user->last_name}}'s Balance ({{$currency->symbol}})</label>
                      <input type="number" class="form-control" wire:model="balance" name="balance">
                    </div>
                    <div class="col-12 d-grid">
                      <button type="submit" class="btn btn-outline-primary" wire:loading.attr="disabled">
                          <span wire:loading.remove>Create Plan</span>
                          <span wire:loading class="spinner-border spinner-border-sm mx-2 text-primary" role="status">
                          <span class="sr-only">Loading...</span>
                          </span>
                      </button>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title fw-semibold">Deposit Log</h6>
        @if(!count($deposits))
        <p>{{$user->first_name.' '.$user->last_name}} has not made any deposit.</p>
        @else
        <div class="table-responsive">
          <table id="dataTable" class="table table-hover">
            <thead>
              <tr>
                <th>SN</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Ref</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($deposits as $k=>$deposit)
              <tr>
                <td>{{++$k}}.</td>
                <td>{{$currency->symbol.number_format($deposit->amount)}}</td>
                <td>{{date("d/m/y h:i:A", strtotime($deposit->created_at))}}</td>
                @if($deposit->status==0)
                <td class="text-primary">Pending</td>
                @elseif($deposit->status==1)
                <td class="text-success">Approved</td>
                @else
                <td class="text-danger">Declined</td>
                @endif
                <td>{{$deposit->ref}}</td>
                <td class="text-center">
                  <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-secondary pb-3px" data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @if($deposit->status==0)  
                  <a class="dropdown-item d-flex align-items-center" wire:click.prevent="approveDeposit({{$deposit->id}})" href="#"><i data-feather="check-square" class="icon-sm me-2"></i> <span class="">Approve</span></a>
                  <a class="dropdown-item d-flex align-items-center" wire:click.prevent="declineDeposit({{$deposit->id}})" href="#"><i data-feather="x-square" class="icon-sm me-2"></i> <span class="">Decline</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-target="#delete{{$deposit->id}}"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  @else
                  <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-target="#delete{{$deposit->id}}"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  @endif
                  </div>
                  </div>
                </td>
              </tr>
              <div class="modal fade" id="delete{{$deposit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <h6>Are you sure you want to delete this deposit?</h6>
                    </div>  
                    <div class="modal-footer">
                      <a href="#" wire:click.prevent="destroyDeposit({{$deposit->id}})" class="btn btn-primary">Save changes</a>
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

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title fw-semibold">INVESTMENT LOG</h6>
        @if(!count($investments))
        <p>{{$user->first_name.' '.$user->last_name}} is yet to invest.</p>
        @else
        <div class="table-responsive">
          <table id="dataTable1" class="table table-hover">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Plan</th>
                <th>Capital</th>
                <th>Interest</th>
                <th>Start Date</th>
                <th>Due Date</th>
                <th>Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($investments as $k=>$investment)
              <tr>
                <td>{{++$k}}.</td>
                <td>{{$investment->plan->name}}</td>
                <td>{{$currency->symbol.number_format($investment->capital)}}</td>
                <td>{{$currency->symbol.number_format($investment->interest)}}</td>
                <td>{{date("d/m/y h:i:A", strtotime($investment->start_date))}}</td>
                <td>{{date("d/m/y h:i:A", strtotime($investment->end_date))}}</td>
                @if($investment->status==1)
                <td class="text-success">Completed</td>
                @else
                <td class="text-info">Active</td>
                @endif
                <td class="text-center">
                  <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-secondary pb-3px" data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" wire:click.prevent="destroyInv({{$investment->id}})" href="#"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
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

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title fw-semibold">WITHDRAWAL LOG</h6>
        @if(!count($payouts))
        <p>{{$user->first_name.' '.$user->last_name}} has not requested for any withdrawal.</p>
        @else
        <div class="table-responsive">
          <table id="dataTable2" class="table table-hover">
            <thead>
              <tr>
                <th>SN</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Ref</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($payouts as $k=>$payout)
              <tr>
                <td>{{++$k}}.</td>
                <td>{{$currency->symbol.number_format($payout->amount)}}</td>
                <td>{{date("d/m/y h:i:A", strtotime($payout->created_at))}}</td>
                @if($payout->status==0)
                <td class="text-primary">Pending</td>
                @elseif($payout->status==1)
                <td class="text-success">Approved</td>
                @else
                <td class="text-danger">Declined</td>
                @endif
                <td>{{$payout->ref}}</td>
                <td class="text-center">
                  <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-secondary pb-3px" data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @if($payout->status==0)  
                  <a class="dropdown-item d-flex align-items-center" wire:click.prevent="approvePayout({{$payout->id}})" href="#"><i data-feather="check-square" class="icon-sm me-2"></i> <span class="">Approve</span></a>
                  <a class="dropdown-item d-flex align-items-center" wire:click.prevent="declinePayout({{$payout->id}})" href="#"><i data-feather="x-square" class="icon-sm me-2"></i> <span class="">Decline</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-target="#delete{{$payout->id}}"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  @else
                  <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-target="#delete{{$payout->id}}"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  @endif
                  </div>
                  </div>
                </td>
              </tr>
              <div class="modal fade" id="delete{{$payout->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <h6>Are you sure you want to delete this payout?</h6>
                    </div>  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <a href="#" wire:click.prevent="destroyPayout({{$payout->id}})" class="btn btn-primary">Save changes</a>
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

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title fw-semibold">REFERRAL EARNINGS</h6>
        @if(!count($referral_earnings))
        <p>{{$user->first_name.' '.$user->last_name}} has not referred any investing investor.</p>
        @else
        <div class="table-responsive">
          <table id="dataTable3" class="table table-hover">
            <thead>
              <tr>
                <th>Referred User ID</th>
                <th>Earning</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($referral_earnings as $k=>$referral)
              <tr>
                <td>BASIC</td>
                <td>{{$currency->symbol.number_format($referral->amount)}}</td>
                <td>{{date("d-m-y", strtotime($user->created_at))}}</td>
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

</div>
