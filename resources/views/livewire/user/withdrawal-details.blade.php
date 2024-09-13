<div>
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a wire:navigate href="{{route('withdrawal')}}">{{__('Withdraw')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('Withdrawal Details')}}</li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-3 mt-4 fw-semibold">{{__('Withdrawal Details')}}</h4>  
          <div class="container">  
            <div class="row">
              <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                  <h6 class="card-header fw-semibold text-secondary">{{__('Withdrawal Details')}}</h6>
                    <div class="card-body">
                      <form class="row g-3" wire:submit="addDetails">
                        <div class="col-12">
                          <label for="bank_name">{{__('Bank Name')}}</label>
                          <input type="text" class="form-control @error('bank_name') is-invalid @enderror" wire:model="bank_name" name="bank_name" placeholder="{{__('Enter your bank name')}}">
                          @error('bank_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="col-12">
                          <label for="account_number">{{__('Bank Account Number')}}</label>
                          <input type="number" class="form-control @error('account_number') is-invalid @enderror" wire:model="account_number" name="account_number" placeholder="{{__('Enter bank account number')}}">
                          @error('account_number')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="col-12">
                          <label for="routing_number">{{__('Bank Routing Number')}}</label>
                          <input type="number" class="form-control @error('routing_number') is-invalid @enderror" wire:model="routing_number" name="routing_number" placeholder="{{__('Enter bank\'s routing number')}}">
                          @error('routing_number')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="col-12">
                          <label for="swift_code">Bank SWIFT Code </label>
                          <input type="text" class="form-control @error('swift_code') is-invalid @enderror" wire:model="swift_code" name="swift_code" placeholder="{{__('Enter your bank\'s SWIFT code')}}">
                          @error('swift_code')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="col-12">
                          <label for="paypal">Paypal </label>
                          <input type="email" class="form-control @error('paypal') is-invalid @enderror" wire:model="paypal" name="paypal" placeholder="{{__('Enter your paypal email')}}">
                          @error('paypal')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="col-12">
                          <label for="wallet_address">{{__('Wallet Address')}}</label>
                          <input type="text" class="form-control @error('wallet_address') is-invalid @enderror" wire:model="wallet_address" name="wallet_address" placeholder="{{__('Enter your wallet address')}}">
                          @error('wallet_address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        
                        <div class="d-grid">
                          <button type="submit" class="btn btn-block btn-outline-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>{{__('Save')}}</span>
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
