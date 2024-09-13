<div>
<section id="content">
<div class="content-wrap pb-0">
  <div class="clear"></div>
  <div class="section mt-0 mb-3">
    <div class="container">
    <div class="row align-items-center">
      <div class="col-md-4 offset-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="mb-3">{{__('Create new password')}}</h4>
            <div class="form-widget">
              <form class="row mb-0" wire:submit="resetPassword">
                <div class="col-12 form-group mb-3">
                  <label for="email">{{__('Email Address')}}</label>
                    <input type="email" class="form-control input-sm @error('email') is-invalid @enderror" id="email" name="email" wire:model="email'" autocomplete="email" placeholder="{{__('Enter Email Address')}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                </div>
                <div class="col-12 form-group mb-3">
                  <label for="password">{{__('New Password')}}</label>
                    <input type="password" class="form-control input-sm @error('password') is-invalid @enderror" id="password" placeholder="{{__('Enter new password')}}" name="password" autocomplete="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                </div>
                <div class="col-12 form-group mb-3">
                  <label for="password-confirm">{{__('Confirm Password')}}</label>
                   <input type="password" class="form-control input-sm" id="password_confirm" wire:model ="password_confirmation" name="password_confirmation" autocomplete="password" placeholder="{{__('Confirm Password')}}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </div>
                <div class="col-12 form-group mb-0">
                  <button type="submit" class="button btn-block nott ls0 m-0" wire:loading.attr="disabled">
                    <span wire:loading.remove>{{__('RESET PASSWORD')}}</span>
                    <span wire:loading class="spinner-border spinner-border-sm mx-2 text-light" role="status">
                      <span class="sr-only">{{__('Loading...')}}</span>
                    </span>
                  </button>
                </div>
                <div class="col-6 form-group mb-3">
                  <a wire:navigate href="{{ route('login') }}" class="d-block mt-3 text-muted"><ins>{{('Sign In')}}</ins></a>
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
</section>

</div>
