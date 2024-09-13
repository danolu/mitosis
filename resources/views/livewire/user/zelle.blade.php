<div>
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a wire:navigate href="{{route('deposit')}}">{{__('Fund Account')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">Zelle</li>
    </ol>
  </nav>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-3 mt-4 fw-semibold">{{__('Deposit With')}} Zelle</h4>  
          <div class="container">  
            <div class="row">
              <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                  <h6 class="card-header fw-semibold text-secondary">{{__('Deposit with')}} Zelle</h6>
                    <div class="card-body">
                      <form class="row g-3" wire:submit="makePayment">
                        <div class="">
                          <label for="account_number">{{__('Amount')}}</label>
                          <input type="number" class="form-control" wire:model="amount" name="amount" id="amount" placeholder="{{__('Enter Amount')}}">
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
  