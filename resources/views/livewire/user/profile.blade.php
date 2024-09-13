<div class="profile-page tx-13">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="profile-header card mt-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center col-md-6 col-sm-12 mb-4">
            <div class="d-flex align-items-center col-md-6 col-sm-12">
              @if(!$user->profile_photo)
              <img class="profile-pic rounded-circle" src="{{ asset('assets/images/user.svg') }}" height="100" alt="avatar">
              @else
              <img class="profile-pic rounded-circle" src="{{ asset($user->profile_photo) }}" height="100" alt="avatar">
              @endif
              <div class="ml-3">
                <h4 class="fw-semibold">{{$user->first_name.' '.$user->last_name}}</h4>
                <p class="mt-1 text-muted">&nbsp; {{'@'.$user->username}}</p>
                <h6 class="mt-2 fw-semibold text-muted">{{__('Joined')}} {{date("M Y", strtotime($user->created_at))}}</h6>
              </div>
            </div>
            </div>
            <div class="d-flex justify-content-between align-items-center col-md-6 col-sm-12 mb-4">
            <div>
              <a class="mb-2 btn btn-outline-secondary btn-icon-text btn-edit-profile" wire:navigate href="{{route('profile.edit')}}">
                <i data-feather="edit" class="btn-icon-prepend"></i> {{__('Edit Profile')}}
              </a>
              <a class="mb-2 btn btn-outline-warning btn-icon-text btn-edit-profile" wire:navigate href="{{route('password')}}">
                <i data-feather="lock" class="btn-icon-prepend"></i> {{__('Change Password')}}
              </a>
            </div>
          </div>

          <hr class="mt-4">
          <h5 class="m-2 fw-semibold">{{__('Personal Information')}}</h5>
          <hr>
          <div class="mt-4 profile-body">
            <div class="align-items-center m-2">
              <h6 class="card-title mb-2 mt-4 fw-semibold">{{__('Email')}}</h6>
              <p>{{$user->email}}</p>
              <h6 class="card-title mb-2 mt-4 fw-semibold">{{__('Phone')}}</h6>
              <p>{{$user->phone}}</p>
              <h6 class="card-title mb-2 mt-4 fw-semibold">{{__('Address')}}</h6>
              <p>{{$user->zip.', '.$user->street.', '.$user->city.', '.$user->state.', '.$user->country.'.'}}</p>
              @if ($user->bank_name)
              <h6 class="card-title mb-2 mt-4 fw-semibold">{{__('Bank Name')}}</h6>
              <p>{{$user->bank_name}}</p>
              @endif
              @if ($user->bank_account_number)
              <h6 class="card-title mb-2 mt-4 fw-semibold">{{__('Account Number')}}</h6>
              <p>{{$user->bank_account_number}}</p>
              @endif
              @if ($user->swift_code)
              <h6 class="card-title mb-2 mt-4 fw-semibold">SWIFT Code</h6>
              <p>{{$user->swift_code}}</p>
              @endif
              @if ($user->routing_number)
              <h6 class="card-title mb-2 mt-4 fw-semibold">{{__('Routing Number')}}</h6>
              <p>{{$user->routing_number}}</p>
              @endif
              @if ($user->paypal)
              <h6 class="card-title mb-2 mt-4 fw-semibold">Paypal Email</h6>
              <p>{{$user->paypal}}</p>
              @endif
              @if ($user->wallet_address)
              <h6 class="card-title mb-2 mt-4 fw-semibold">{{__('Wallet Address')}}</h6>
              <p>{{$user->wallet_address}}</p>
              @endif
              
            </div>
          </div>
          <hr class="mt-4">
          <h5 class="m-2 fw-semibold">{{__('Your Data')}}</h5>
          <hr>
          <div class="mt-4 profile-body">
            <div class="align-items-center m-2">
              <h6 class="card-title mb-2 mt-4 fw-semibold">{{__('Investments')}} ({{__('Total')}})</h6>
              <p>{{$total_inv}}</p>
              <h6 class="card-title mb-2 mt-4 fw-semibold">{{__('Profits Accrued')}}</h6>
              <p>{{$currency->symbol.number_format($user->profits)}}</p>
              <h6 class="card-title mb-2 mt-4 fw-semibold">{{__('Investors Referred')}}</h6>
              <p>{{$total_ref}}</p>
              <h6 class="card-title mb-2 mt-4 fw-semibold">{{__('Total Referral Earning')}}</h6>
              <p>{{$currency->symbol.number_format($user->referral_bonus)}}</p>
            </div>
          </div>            
        </div>
      </div>
    </div>
  </div> 
</div>