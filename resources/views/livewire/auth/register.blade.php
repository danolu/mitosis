<div> 
      <section id="content">
      <div class="content-wrap pb-0">
        <div class="clear"></div>
        <div class="section mt-0 mb-3">
          <div class="container">
          <div class="row align-items-center">
            <div class="col-md-8 offset-md-2">
              <div class="card shadow-sm">
                <div class="card-body">
                  <h4 class="mb-3">{{__('Create an account')}}</h4>
                  <div class="form-widget">
                    <div class="form-result"></div>
                    <form class="row mb-0" wire:submit="register"> 
                      <div class="col-md-6 form-group mb-3">
                        <label for="first_name">{{__('First Name')}}</label>
                        <input type="text" class="form-control input-sm @error('first_name') is-invalid @enderror" id="first_name" name="first_name" autocomplete="first_name" placeholder="{{__('First Name')}}" wire:model="first_name" autofocus>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="last_name">{{__('Last Name')}}</label>
                        <input type="text" class="form-control input-sm @error('last_name') is-invalid @enderror" id="last_name" name="last_name" autocomplete="last_name" wire:model="last_name" placeholder="{{__('Last Name')}}">
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="email">{{__('Email Address')}}</label>
                        <input type="email" class="form-control input-sm @error('email') is-invalid @enderror" id="email" name="email" wire:model="email" autocomplete="email" placeholder="{{__('Email Address')}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control input-sm @error('phone') is-invalid @enderror" autocomplete="phone" id="phone" name="phone" wire:model="phone" placeholder="{{__('Phone Number')}}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="street">{{__('Street Address')}}</label>
                        <input type="text" class="form-control input-sm @error('street') is-invalid @enderror" wire:model="street" id="street" name="street" autocomplete="street" placeholder="{{__('Enter street address')}}">
                        @error('street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror   
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="city">{{__('City')}}</label>
                        <input type="text" class="form-control input-sm @error('city') is-invalid @enderror" wire:model="city" id="city" name="city" autocomplete="city" placeholder="{{__('Enter city')}}">
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror   
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="state">{{__('State of residence')}}</label>
                        <input type="text" class="form-control input-sm @error('state') is-invalid @enderror" wire:model="state" id="state" name="state" autocomplete="state" placeholder="{{__('Enter state of residence')}}">
                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror   
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="country">{{__('Country of residence')}}</label>
                        <input type="text" class="form-control input-sm @error('country') is-invalid @enderror" wire:model="country" id="country" name="country" autocomplete="country" placeholder="{{__('Enter country of residence')}}">
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror   
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="address">ZIP Code</label>
                        <input type="text" class="form-control input-sm @error('zip') is-invalid @enderror" wire:model="zip" id="zip" name="zip" autocomplete="zip" placeholder="Enter ZIP Code">
                        @error('zip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror   
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="username">{{__('Username')}}</label>
                          <input type="text" class="form-control input-sm @error('username') is-invalid @enderror" wire:model="username" id="username" name="username" autocomplete="username" placeholder="{{__('Enter Username')}}">
                          @error('username')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror 
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="password">{{__('Password')}}</label>
                        <input type="password" class="form-control input-sm @error('password') is-invalid @enderror" id="password" placeholder="{{__('Choose password')}}" wire:model="password" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="password-confirmation">{{__('Confirm Password')}}</label>
                         <input type="password" class="form-control input-sm @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" wire:model="password_confirmation" placeholder="{{__('Confirm Password')}}">
                          @error('password_confirmation')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror 
                      </div>
                      <div class="col-12 form-group mb-3">
                        <input type="checkbox" id="terms" name="terms" wire:model="terms" class="checkbox-style">
                        <label for="terms" class="checkbox-style-3-label checkbox-small">{{__('Accept terms and conditions')}}</label>
                      </div>

                      <div class="col-12 form-group mb-0">
                        <button type="submit" class="button btn-block nott ls0 m-0" wire:loading.attr="disabled">
                          <span wire:loading.remove>{{__('REGISTER')}}</span>
                          <span wire:loading class="spinner-border spinner-border-sm mx-2 text-light" role="status">
                            <span class="sr-only">{{__('Loading...')}}</span>
                          </span>
                        </button>
                      </div>
                      <div class="col-6 form-group mb-3">
                        <a wire:navigate href="{{ route('login') }}" class="d-block mt-3 text-muted">{{__('Already a user')}}? {{__('Sign In')}}</a>
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
