<div>
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a wire:navigate href="{{route('deposit')}}">{{__('Fund Account')}}</a></li>
      <li class="breadcrumb-item" aria-current="page"><a wire:navigate href="{{route('deposit-btc')}}">{{__('Cryptocurrency')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('Validate Payment')}}</li>
    </ol>
  </nav>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-3 mt-4 fw-semibold">{{__('Deposit With Cyptocurrency')}}</h4>  
          <div class="container">  
            <div class="row">
              <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                  <h6 class="card-header fw-semibold text-secondary">{{__('Deposit with')}} {{$coin}}</h6>
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="mb-3">
                          <img class="mb-3" src="{{ asset('assets/'.$qr_code.'.webp') }}" width="100%"> 

                          <h5 class="mb-3">{{__('To deposit')}} {{$currency->symbol.number_format($amount)}} {{__('with')}} {{$coin}}, {{__('kindly send')}} <span class="fw-semibold">{{$equiv.$coin}}</span> {{__('to')}} <span class="fw-semibold">{{$wallet_address}}</span></h5> 
                          
                          <h6 class="text-info fw-semibold">Once transfer has been made, click on deposit button below. Your transaction will be reviewed within the next 30 to 60 minutes, after which your account will be credited.</h6>
                        </div>
                        
                        <div class="col-sm-12 d-grid">
                          <button wire:click.prevent="makePayment" class="btn btn-block btn-outline-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>{{__('Lodge Deposit')}}</span>
                            <div wire:loading class="spinner-border spinner-border-sm mx-2 text-success" role="status">
                              <span class="sr-only">{{__('Loading...')}}</span>
                            </div>
                          </button>
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
  </div>
</div>