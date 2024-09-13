<div>
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a wire:navigate href="{{route('plans')}}">{{__('Investment Plans')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('Invest')}}</li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-3 mt-4 fw-semibold">{{$plan->name}} {{__('Plan')}} ({{$plan->interest}}% {{__('Interest')}})</h4>

          <div class="container">  
            <div class="row">
              <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                  <h6 class="card-header fw-semibold text-secondary">{{__('Earn')}} {{$plan->interest}}% ROI {{__('in')}} @if($plan->duration>1) {{$plan->duration}} {{$plan->period.'s'}}@else {{$plan->duration}} {{__($plan->period)}}@endif {{__('with the')}} {{$plan->name}} {{__('Plan')}}</h6>
                  <div class="card-body">
                    <form class="row" wire:submit="invest({{$plan}})">
                      <div class="mb-3">
                        <label for="capital">{{('Capital range must be within')}} <span class="fw-semibold text-semibold">{{$currency->symbol.number_format($plan->min_capital)}} and {{$currency->symbol.number_format($plan->max_capital)}}*</span> </label>
                        <div class="input-group">
                          <div class="input-group-text">
                            {{$currency->symbol}}
                          </div>
                          <input type="number" wire:model.live="capital" class="form-control @error('capital') is-invalid @enderror" name="capital" id="capital" placeholder="{{__('Enter Capital')}}">
                        </div>
                        @if($capital)
                        <p class="animate__animated animate__fadeInLeft mt-2">{{__('Your capital will earn you an interest of', ['interest' => $currency->symbol.$interest, 'date' => date('l j M, Y', strtotime($ending_date))])}} </p>
                        @endif
                        @error('capital') 
                        <div class="animate__animated animate__fadeInRight alert alert-danger mt-2" role="alert">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                        
                      <div class="col-sm-12 d-grid">
                        <button type="submit" class="btn btn-outline-primary" wire:loading.attr="disabled">
                          <span wire:loading.remove>{{__('Invest')}}</span>
                          <span wire:loading class="spinner-border spinner-border-sm mx-2 text-primary" role="status">
                            <span class="sr-only">{{__('Loading...')}}</span>
                          </span>
                        </button>
                      </div>

                      <div class="col-sm-12 response d-none">
                        <div class="animate__animated animate__fadeInRight alert alert-success mt-2" role="alert">
                          {{__('Investment successful.')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
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
