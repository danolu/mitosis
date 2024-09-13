<div>
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a wire:navigate href="{{route('deposit')}}">{{__('Fund Account')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('Cryptocurrency')}}</li>
    </ol>
  </nav>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-3 mt-4 fw-semibold">{{__('Deposit With Cryptocurrency')}}</h4>  
          <div class="container">  
            <div class="row">
              <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                  <h6 class="card-header fw-semibold text-secondary">{{__('Deposit with Cryptocurrency')}}</h6>
                    <div class="card-body">
                      <form class="row g-3" wire:submit="makePayment">
                        <div class="col-sm-12 mb-3">
                          <label for="amount" class="fw-semibold">{{__('Amount')}} ({{$currency->symbol}})</label>
                          <input type="number" class="dollar2BTCvalue form-control @error('amount') is-invalid @enderror" wire:model="amount" name="amount" id="amount" placeholder="{{__('Enter Amount')}}">
                          @error('amount')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror 
                        </div>   
                        
                        <div class="col-sm-12 mb-3">
                          <label class="form-label fw-semibold">Cryptocurrency</label>
                          @foreach ($coins as $key => $coin)
                          <div>  
                            <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input" name="coin" wire:model="coin" id="crypto" @error('coin') is-invalid @enderror value="{{$coin}}">
                              <label class="form-check-label" for="crypto">
                                {{$key}}
                              </label>
                            </div>  
                          </div>
                          @endforeach
                          @error('coin')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
              
                        <div class="col-sm-12 d-grid">
                          <button type="submit" class="btn btn-block btn-outline-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>{{__('Continue')}}</span>
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