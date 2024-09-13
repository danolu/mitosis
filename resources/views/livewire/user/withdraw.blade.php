<div>
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a wire:navigate href="{{route('withdrawal')}}">{{__('Withdraw')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('Withdraw')}}</li>
    </ol>
  </nav>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-3 mt-4 fw-semibold">{{__('Request Withdrawal')}}</h4>
  
          <div class="container">  
            <div class="row">
              <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                  <h6 class="card-header fw-semibold text-secondary">{{__('Request Withdrawal')}}</h6>
                  <div class="card-body">
                    @if(($user->bank_name && $user->bank_account_number) || $user->paypal || $user->wallet_address)
                    <form class="row" wire:submit="withdrawSubmit">
                      <div class="col-sm-12 mb-3">
                        <label for="amount" class="mb-2">{{__('Amount')}} ({{$currency->symbol}})</label> 
                        <input type="number" class="form-control @error('amount') is-invalid @enderror" wire:model="amount" name="amount" placeholder="{{__('Enter amount to withdraw')}}">
                        @error('amount') 
                        <div class="animate__animated animate__fadeInRight alert alert-danger mt-2" role="alert">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                      <div class="col-sm-12 mb-3">
                        <label for="method">{{__('Method')}} ({{$currency->symbol}})</label>
                        <select class="form-control @error('method') is-invalid @enderror" wire:model="method" name="method">
                          <option selected disabled hidden value="">{{__('Select withdrawal method')}}</option>
                          @if ($user->bank_name && $user->bank_account_number)
                          <option value="Bank">{{__('Bank')}}</option>
                          @endif
                          @if ($user->paypal)
                          <option value="Paypal">Paypal</option>
                          @endif
                          @if ($user->wallet_address)
                          <option value="Bitcoin">Bitcoin</option>
                          @endif            
                        </select>
                        @error('method') 
                        <div class="animate__animated animate__fadeInRight alert alert-danger mt-2" role="alert">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                        
                      <div class="col-sm-12 d-grid">
                        <button type="submit" class="btn btn-outline-primary" wire:loading.attr="disabled">
                          <span wire:loading.remove>{{__('Withdraw')}}</span>
                          <span wire:loading class="spinner-border spinner-border-sm mx-2 text-success" role="status">
                            <span class="sr-only">{{__('Loading...')}}</span>
                          </span>
                        </button>
                      </div>
  
                      <div class="col-sm-12 response d-none">
                        <div class="animate__animated animate__fadeInRight alert alert-success mt-2" role="alert">
                          {{__('Withdrawal successful.')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>
                    </form>
                    @else
                    <h3 class="my-4 text-center">
                      <a href="{{route('withdrawal-details')}}" wire:navigate class="btn btn-primary">{{__('Add Withdrawal Details')}} </a>
                    </h3>
                    @endif
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
    