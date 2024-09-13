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
            <h4 class="mb-3">{{__('Enter your email to get a reset link')}}</h4>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form-widget">
              <form class="row mb-0" wire:submit="requestLink">
                <div class="col-12 form-group mb-3">
                  <label for="email">{{__('Email Address')}}</label>
                    <input type="email" class="form-control input-sm required @error('email') is-invalid @enderror" id="email" name="email" wire:model="email" autocomplete="email" placeholder="{{__('Enter Email Address')}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                </div>
                <div class="col-12 form-group mb-0">
                  <button type="submit" class="button button-rounded btn-block nott ls0 m-0" wire:loading.attr="disabled">
                    <span wire:loading.remove>{{__('SEND RESET LINK')}}</span>
                    <span wire:loading class="spinner-border spinner-border-sm mx-2 text-light" role="status">
                      <span class="sr-only">{{__('Loading...')}}</span>
                    </span>
                  </button>
                </div>
                <div class="col-6 form-group mb-3">
                  <a wire:navigate href="{{ route('login') }}" class="d-block mt-3"><ins>{{__('Sign In')}}</ins></a>
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
