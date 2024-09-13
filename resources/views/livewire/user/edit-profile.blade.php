<div>
    <nav class="page-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a wire:navigate href="{{route('profile')}}">{{__('Profile')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Edit Profile')}}</li>
      </ol>
    </nav>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h4 class="mb-3 mt-4 fw-semibold">{{__('Edit Profile')}}</h4>  
            <div class="container">  
              <div class="row">
                <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                  <div class="card">
                    <h6 class="card-header fw-semibold text-secondary">{{__('Edit Profile')}}</h6>
                      <div class="card-body">
                        <form class="row g-3 mb-3" wire:submit="updateAvatar" enctype="multipart/form-data">
                          <div class="col-12 mb-3">
                            <label for="avatar">{{__('Update Avatar')}}</label>
                            <input class="form-control @error('avatar') is-invalid @enderror" type="file" wire:model="avatar" name="avatar">
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                          <div class="d-grid col-12 mb-3">
                            <button type="submit" class="btn btn-outline-primary" wire:loading.attr="disabled">
                              <span class="wire:loading.remove">{{__('Update Avatar')}}</span>
                              <div wire:loading class="spinner-border spinner-border-sm mx-2 text-success" role="status">
                                <span class="sr-only">{{__('Loading...')}}</span>
                              </div>
                            </button>
                          </div>
                        </form>
                        <form class="row g-3" wire:submit="update">
                          <div class="col-12">
                            <label for="name">{{__('Full Name')}}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" name="name" readonly>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="username">{{__('Username')}}</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" wire:model="username" name="username" readonly>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email" name="email" readonly>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="phone">{{__('Phone Number')}}</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" wire:model="phone" name="phone" placeholder="{{__('Enter phone number')}}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="street">{{__('Street')}}</label>
                            <input type="text" class="form-control @error('street') is-invalid @enderror" wire:model="street" name="street" placeholder="{{__('Enter your street name')}}">
                            @error('street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="city">{{__('City')}}</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" wire:model="city" name="city" placeholder="{{__('Enter your city')}}">
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="state">{{__('State')}}</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" wire:model="state" name="state" placeholder="{{__('Enter your state')}}">
                            @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="country">{{__('Country')}} </label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" wire:model="country" name="country" placeholder="{{__('Enter your country')}}">
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="zip">ZIP Code </label>
                            <input type="text" class="form-control @error('zip') is-invalid @enderror" wire:model="zip" name="zip" placeholder="{{__('Enter your ZIP code')}}">
                            @error('zip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          
                          <div class="d-grid">
                            <button type="submit" class="btn btn-block btn-outline-primary" wire:loading.attr="disabled">
                              <span wire:loading.remove>{{__('Update')}}</span>
                              <div wire:loading class="spinner-border spinner-border-sm mx-2 text-success" role="status">
                                <span class="sr-only">{{__('Loading...')}}</span>
                              </div>
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
    </div>
</div>
