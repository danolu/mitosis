<div>
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a wire:navigate href="{{route('deposit')}}">{{__('Fund Account')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('Bank Transfer')}}</li>
    </ol>
  </nav>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="my-3 fw-semibold">{{__('Bank Transfer')}}</h4>  
          <div class="container">  
            <div class="row">
              <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                  <h6 class="card-header fw-semibold text-secondary">{{__('Deposit with Bank Transfer')}}</h6>
                  <div class="card-body">
                    <form class="row g-3" wire:submit="makeDeposit" enctype="multipart/form-data">
                      <h6 class="mb-2">{{__('Banker')}}: {{$site_bank->banker}}</h6>
                      <h6 class="mb-2">{{__('Routing Number')}}: {{$site_bank->routing_number}}</h6>
                      <h6 class="mb-2">{{('Account Number')}}: {{$site_bank->account_number}}</h6>
                      <h6 class="mb-2">{{__('Swift Code')}}: {{$site_bank->swift_code}}</h6>
                      <h6 class="mb-2">{{__('Account Name')}}: {{$site_bank->account_name}}</h6>
                      <hr>
                      <p class="mb-2 text-danger">{{__('Only deposits of $10, 000 and above is allowed through this channel.')}}</p>
                      <p class="mb-2 text-primary">{{__('Wire transfers typically take approximately 2-3 days to be fully processed. Please make sure to keep a copy of your transaction receipt to allow us to verify your deposit. For further assistance, please contact us using the chat box.')}}</p>
                      <hr>
                      <div class="col-12">
                        <label for="amount">{{__('Amount')}} ({{$currency->symbol}})</label>
                        <input type="number" class="form-control @error('amount') is-invalid @enderror" wire:model="amount" name="amount" id="amount" placeholder="{{__('Enter amount deposited')}}">
                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                      </div>
                      <div class="col-12">
                        <label for="receipt">{{__('Upload Receipt')}}</label>
                        <div>
                          <input class="form-control @error('receipt') is-invalid @enderror" type="file" name="receipt" id="receipt" wire:model="receipt" placeholder="Upload Receipt">
                        </div>
                        @error('receipt')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror 
                      </div>
                      
                      <div class=" col-12 d-grid">
                        <button type="submit" class="btn btn-block btn-outline-primary" wire:loading.attr="disabled">
                          <span wire:loading.remove>{{__('Lodge Deposit')}}</span>
                          <div wire:loading class="spinner-border spinner-border-sm mx-2 text-primary" role="status">
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