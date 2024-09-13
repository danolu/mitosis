<div>
  @if(count($active_invs))
  <div>
    <h4 class="fw-semibold mb-2">{{__('Active Investments')}}</h4>
  </div>
  <div class="row">
    @foreach($active_invs as $inv)
    <div class="col-md-4 grid-margin stretch-card" wire:key="{{ $inv->id }}">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-3 fw-semibold">{{$inv->plan->name}} ({{$inv->plan->interest}}% {{__('Interest')}}) - {{$inv->ref}} </h5>
          <h6 class="text-secondary fw-bold mb-3"> {{$currency->symbol.number_format($inv->capital)}} {{__('Capital')}}</h6>

          <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width:{{ progress($inv->start_date, $inv->end_date)}}%;" aria-valuenow="{{ progress($inv->start_date, $inv->end_date)}}%" aria-valuemin="0" aria-valuemax="100">{{ progress($inv->start_date, $inv->end_date)}}%</div>
          </div>
          <div class="row mt-4 mb-3">
            <div class="col-4">
              <label class="d-flex tx-10 text-uppercase">{{__('Start Date')}}</label>
              <h5 class="fw-semibold mb-0 text-secondary">{{date("d-m-y", strtotime($inv->start_date))}}</h5>
            </div>
            <div class="col-4">
              <label class="d-flex tx-10 text-uppercase">{{__('Interest')}}</label>
              <h5 class="fw-semibold mb-0 text-secondary">{{$currency->symbol.number_format($inv->interest)}}</h5>
            </div>
            <div class="col-4">
              <label class="d-flex tx-10 text-uppercase">{{__('End Date')}}</label>
              <h5 class="fw-semibold mb-0 text-secondary">{{date("d-m-y", strtotime($inv->end_date))}}</h5>
            </div>
          </div> 
          @if($inv->autorenewal==0)
          <div class="d-grid">
            <a wire:click="autoRenew({{$inv}})" class="btn btn-primary">
              <span wire:loading.remove>{{__('Autorenew')}}</span> 
              <div wire:loading class="spinner-border spinner-border-sm mx-2 text-primary" role="status">
                <span class="sr-only">{{__('Loading...')}}</span>
              </div>
            </a>
          </div>
          @else
          <div class="d-grid">
            <a wire:click="cancelRenewal({{$inv}})" class="btn btn-outline-primary" wire:loading.attr="disabled">
              <span wire:loading.remove>{{__('Cancel Renewal')}}</span>
              <div wire:loading class="spinner-border spinner-border-sm mx-2 text-primary" role="status">
                <span class="sr-only">{{__('Loading...')}}</span>
              </div>
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>  
  @else
  <p>{{__('You do not have any active investments at the moment.')}}
  @endif

  @if(count($completed_invs))
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-2 mt-4 fw-semibold">{{__('Completed Investments')}}</h4>
          <div class="container">  
            <div class="row">
              @foreach($completed_invs as $inv)
              <div class="col-md-4 mb-4 stretch-card" wire:key="{{ $inv->id }}">
                <div class="card">
                  <div class="card-header">
                    <h6 class="fw-semibold">{{__('Started')}} {{date("d-m-y", strtotime($inv->start_date))}}</h6>
                  </div>
                  <div class="card-body text-body-secondary fw-normal">
                    <h6 class="mb-2 fw-semibold">{{$inv->plan->name}} {{('Plan')}}</h6>
                    <h6 class="mb-2">{{__('Capital')}}: {{$currency->symbol.number_format($inv->capital)}}</h6>
                    <h6 class="mb-2">{{__('Interest')}}: {{$currency->symbol.number_format($inv->interest)}}</h6>
                    <h6>{{__('Reference')}}: {{$inv->ref}}</h6>
                  </div>
                  <div class="card-footer">
                  <h6 class="fw-semibold">{{('Ended')}} {{date("d-m-y", strtotime($inv->end_date))}}</h6>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>