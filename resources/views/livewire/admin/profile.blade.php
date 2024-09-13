<div class="row">
  <div class="col-12 grid-margin">
    <div class="profile-header card mt-4">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <h5 class="mb-4 fw-semibold">Admin Login Details</h5>
            <form wire:submit="update" class="row">
              <div class="col-12 mb-2">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" wire:model="username" name="username" id="username">
                @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-12 mb-2">
                <label for="email">Email</label>
                <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              
              <div class="col-12 mb-2">
                <label for="old_password">Current Password </label>
                <input type="password" wire:model="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Enter a password for your account" name="old_password" id="old_password">
                @error('old_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-12 mb-2">
                <label for="password">New Password (must be a minimum of 8 characters)</label>
                <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter a password for your account" name="password" id="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-12 mb-2">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" wire:model="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm your new password" name="password_confirmation" id="password_confirmation">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              
              <div class="col-12 d-grid">
                <button type="submit" class="btn btn-outline-primary" wire:loading.attr="disabled">
                  <span wire:loading.remove>Update</span>
                  <span wire:loading class="spinner-border spinner-border-sm mx-2 text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                  </span>
                </button>
              </div>
            </form>
          </div>
        </div>

        <hr class="mt-4">
        <h5 class="m-2 fw-semibold">Statistics</h5>
        <hr>
        <div class="mt-4 profile-body">
          <div class="align-items-center m-2">
            <h6 class="card-title mb-2 mt-4 fw-semibold">Investors</h6>
            <p>{{number_format($users)}}</p>              
            <h6 class="card-title mb-2 mt-4 fw-semibold">Investments Processed</h6>
            <p>{{number_format($investments)}}</p>
            <h6 class="card-title mb-2 mt-4 fw-semibold">Capital Invested (Total)</h6>
            <p>{{$currency->symbol.number_format($total_capital)}}</p>
            <h6 class="card-title mb-2 mt-4 fw-semibold">Interest Generated (Total)</h6>
            <p>{{$currency->symbol.number_format($total_interest)}}</p>
            <h6 class="card-title mb-2 mt-4 fw-semibold">Payouts (Total)</h6>
            <p>{{$currency->symbol.number_format($total_payout)}}</p>
            <h6 class="card-title mb-2 mt-4 fw-semibold">Referral Bonuses Paid</h6>
            <p>{{$currency->symbol.number_format($total_ref)}}</p>
          </div>
        </div>            
      </div>
    </div>
  </div>
</div> 
