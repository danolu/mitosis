<div>

<div class="profile-page tx-13">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="profile-header card mt-4">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 offset-md-3">
            
                <h5 class="mb-4 fw-semibold">{{__('Change Password')}}</h5>
                <form wire:submit="changePassword" class="row g-3">
                  <div class="col-12">
                    <label for="old_password">{{__('Current Password')}}</label>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" wire:model="old_password" name="old_password" placeholder="{{__('Enter current password')}}">
                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                  </div> 
                  <div class="col-12">
                    <label for="password">{{__('New Password')}}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password" name="password" placeholder="{{('Enter a new password')}}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                  </div>
                  <div class="col-12">
                    <label for="bank">{{__('Confirm New Password')}}</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" wire:model="password_confirmation" placeholder="Confirm new password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                  </div>
                  <div class="col-12 d-grid">
                    <button type="submit" wire:loading.remove class="btn btn-block btn-outline-primary">{{__('Change Password')}}</button>
                    <button class="btn btn-block btn-outline-primary" type="button" disabled wire:loading>
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      <span class="sr-only">{{__('Changing...')}}</span>
                    </button>
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
