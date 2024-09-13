<div>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0 fw-semibold">Welcome back, Administrator.</h4>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="row">
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title fw-semibold">Investors</h6>
                <button class="btn p-0" type="button">
                  <a wire:navigate href="{{route('users')}}"><i class="icon text-secondary pb-3px" data-feather="eye"></i></a>
                </button>
            </div>
            <p class="mb-2 text-success">Active: {{ $active_users }}</p>
            <p class="mb-2 text-danger">Suspended: {{ $suspended_users }}</p>
          </div>
        </div>
      </div>      
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title fw-semibold">Investments</h6>
              <button class="btn p-0" type="button">
                <a wire:navigate href="{{route('admin.investments')}}"><i class="icon text-secondary pb-3px" data-feather="eye"></i></a>
              </button>
            </div>
            <p class="mb-2 text-success">Active: {{ $active_investments }}</p>
            <p class="mb-2">Completed: {{ $completed_investments }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title fw-semibold">Pending Deposits</h6>
              <button class="btn p-0" type="button">
                <a wire:navigate href="{{route('admin.deposits')}}"><i class="icon text-secondary pb-3px" data-feather="eye"></i></a>
              </button>
            </div>
            <h3 class="mb-2">{{ $pending_deposits }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title fw-semibold">Pending Payouts</h6>
              <button class="btn p-0" type="button">
                <a wire:navigate href="{{route('payouts.log')}}"> <i class="icon text-secondary pb-3px" data-feather="eye"></i></a>
              </button>
            </div>
            <h3 class="mb-2">{{ $pending_payouts }}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 

</div>