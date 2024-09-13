<div>
  <section id="content">
  <div class="content-wrap pb-0">
    <div class="clear"></div>
    <div class="section mt-0 mb-3">
      <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 offset-md-3">
          <div class="card shadow-sm">
            <div class="card-body">
              <h4 class="mb-4">{{__('Login')}}</h4>
              @if(Session::has('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{ Session::get('alert') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
              <div class="form-widget">
                <div class="form-result"></div>
                <form class="row mb-0" wire:submit="login">
                  <div class="col-12 form-group mb-3">
                    <label for="username">{{__('Email Address')}} / {{__('Username')}}</label>
                          <input type="text" class="form-control input-sm @error('username') is-invalid @enderror" wire:model="username" autocomplete="username" id="username" placeholder="Enter Email or Username" autofocus>
                          @error('username')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror                  
                        </div>
                        <div class="col-12 form-group mb-3">
                          <label for="password">{{__('Password')}}</label>
                          <input type="password" class="form-control input-sm @error('password') is-invalid @enderror" wire:model="password" id="password" autocomplete="current-password" placeholder="Enter Password">
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror                  
                        </div>
                        <div class="col-12 form-group mb-3">
                    <input id="remember" class="checkbox-style" type="checkbox" {{ old('remember') ? 'checked' : '' }} wire:model="remember">
                    <label for="remember" class="checkbox-style-3-label checkbox-small">{{__("Remember me")}}</label>
                  </div>
                  <div class="col-12 form-group mb-3">
                    <button type="submit" class="button btn-block nott ls0 m-0" wire:loading.attr="disabled">
                      <span wire:loading.remove>{{__('LOG IN')}}</span>
                      <span wire:loading class="spinner-border spinner-border-sm mx-2 text-light" role="status">
                        <span class="sr-only">{{__('Loading...')}}</span>
                      </span>
                    </button>
                  </div>
                  <div class="col-6 form-group mb-3">
                    <a wire:navigate href="{{ route('register') }}" class="d-block mt-3 text-muted"><ins>{{__('Create account')}}</ins></a>
                  </div>
                  <div class="col-6 text-right form-group mb-3">
                    <a class="d-block mt-3" wire:navigate href="{{ route('password.request') }}"><ins>{{ __('Forgot Your Password?') }}</ins></a>
                  </div>
                </form>
                @if(Session::has('alert'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{ Session::get('alert') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
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
