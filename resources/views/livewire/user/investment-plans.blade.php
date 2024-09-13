<div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="my-4">{{('Investment Plans')}}</h4>
          <p class="text-secondary mb-4 pb-2">{{__('Choose a plan that best suits you.')}}</p>
          <div class="mb-4">
            <h3 class="text-center">
              <a href="#calculate" class="btn btn-outline-primary mr-2">{{__('Calculate Interest')}}</a>
            </h3>  
          </div>
          <div class="container">  
            <div class="row">
              @foreach($plans as $plan)
              <div class="col-md-4 mb-4 stretch-card" wire:key="{{ $plan->id }}">
                <div class="card text-center">
                  <div class="card-body"> 
                    <h5 class="text-uppercase mt-3 mb-4 fw-semibold">{{$plan->name}}</h5>
                    <h3 class="mb-2">{{$plan->interest}}% {{__('Interest')}}</h3>
                    @if($plan->duration>1)
                    <h6 class="text-secondary mb-2 font-weight-normal">{{$plan->duration}} {{__($plan->period.'s Term')}}</h6>
                    @else
                    <h6 class="text-secondary mb-2">{{$plan->duration}} {{__($plan->period.' Term')}}</h6>
                    @endif
                    <h6 class="text-secondary mb-2">{{__('Minimum Capital')}}: {{$currency->symbol.number_format($plan->min_capital)}}</h6>
                    <h6 class="text-secondary mb-4">{{__('Maximum Capital')}}: {{$currency->symbol.number_format($plan->max_capital)}}</h6>
                    <div class="d-grid">
                      <a wire:navigate href="{{route('invest', ['plan' => $plan])}}" class="btn btn-outline-primary">{{__('Invest')}}</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
  
        <div class="row" id="calculate">
          <div class="col-md-10 offset-md-1 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title fw-semibold">{{__('Calculate Interest')}}</h6>
                <form class="row g-3">
                  <div class="col-sm-4">
                    <label for="interest_percentage" class="form-label">{{__('Select Plan')}}</label>
                    <select class="form-control" wire:model.live="interest_percentage" id="interest_percentage" name="interest_percentage">
                      <option selected disabled>{{__('Select plan')}}</option>
                      @foreach($plans as $plan)
                      <option value="{{$plan->interest}}" wire:key="{{ $plan->id }}">{{$plan->name}} {{__('Plan')}} - {{$plan->interest.'%'}} {{__('Interest')}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label for="capital" class="form-label">{{__('Capital')}} ({{$currency->symbol}})</label>
                    <input type="number" wire:model.live="interest_capital" class="form-control" id="capital" placeholder="{{__('Enter Capital')}}">
                  </div>
                  <div class="col-sm-4">
                    <label for="capital" class="form-label">Interest ({{$currency->symbol}})</label>
                  <input type="number" value="{{$interest_interest}}" readonly class="form-control" id="capital" placeholder="{{__('Interest')}}">
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>