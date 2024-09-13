<div>
    <div class="profile-page tx-13">
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card mt-4">
            <div class="card-body">
              <hr class="mt-4">
              <h5 class="m-2 fw-semibold">{{__('PERSONAL INFORMATION')}}</h5>
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
            </div>
          </div>
        </div>
      </div> 
    </div>
    </div>
    