<div class="page-content d-flex align-items-center justify-content-center">
  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-6 col-lg-5 mx-auto">
      <div class="card">
        <div class="auth-form-wrapper px-4 py-5">
          <div class="mb-4 pb-2">
          <a href="{{ route('home') }}" class="mb-2"><img src="{{ asset('assets/images/logo.png') }}" height="75px"></a>
          </div>
          <h5 class="text-secondary mb-4">Welcome back, administrator! </h5>
          <form class="row" wire:submit="login">
            <div class="mb-3">
              <label for="username">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" wire:model="username" id="username" name="username" placeholder="Username" autofocus>
              @error('username')
                <span class="invalid-feedback animate__animated animate__fadeInRight" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror                  
            </div>
            <div class="mb-3">
              <label for="password">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" wire:model="password" placeholder="Password">
              @error('password')
                <span class="animate__animated animate__fadeInRight invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror                  
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-outline-primary mb-2 mb-md-0" wire:loading.attr="disabled">
                <span wire:loading.remove>Log In</span>
                <span wire:loading class="spinner-border spinner-border-sm mx-2 text-primary" role="status">
                  <span class="sr-only">Loading...</span>
                </span>
              </button>
            </div>              
          </form>
        </div>
      </div>
    </div>
  </div>
</div>