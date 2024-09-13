<div>

<div class="row mb-4">
  <div class="col-md-3 mb-2">
    <a wire:navigate href="{{route('profile')}}"> 
      <div class="card text-center rounded-3">
        <div class="card-body">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi mb-2 text-primary bi-person" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
          </svg>
          <h6 class="text-secondary fw-semibold">{{ __('Update Profile') }}</h6>
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-3 mb-2">
    <a wire:navigate href="{{route('deposit')}}"> 
      <div class="card text-center rounded-3">
        <div class="card-body">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi mb-2 text-primary bi-credit-card" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
            <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
          </svg>
          <h6 class="fw-semibold text-secondary">{{__('Fund Account')}}</h6>
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-3 mb-2">
    <a wire:navigate href="{{route('withdrawal')}}"> 
      <div class="card text-center rounded-3">
        <div class="card-body">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi mb-2 text-primary bi-cash-stack" viewBox="0 0 16 16">
            <path d="M14 3H1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1h-1z"/>
            <path fill-rule="evenodd" d="M15 5H1v8h14V5zM1 4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H1z"/>
            <path d="M13 5a2 2 0 0 0 2 2V5h-2zM3 5a2 2 0 0 1-2 2V5h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 13a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
          </svg>
          <h6 class="fw-semibold text-secondary">{{__('Withdraw Funds')}}</h6>
        </div>
      </div>
    </a>
  </div>
  @if($user->balance==0)
  <div class="col-md-3 mb-2">
    <a wire:navigate href="{{route('activity')}}"> 
      <div class="card text-center rounded-3">
        <div class="card-body">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi mb-2 text-primary bi-card-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
            <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
            <circle cx="3.5" cy="5.5" r=".5"/>
            <circle cx="3.5" cy="8" r=".5"/>
            <circle cx="3.5" cy="10.5" r=".5"/>
          </svg>
          <h6 class="fw-semibold text-secondary">{{__('Activity Log')}}</h6>
        </div>
      </div>
    </a>
  </div>
  @else
  <div class="col-md-3 mb-2">
    <a wire:navigate href="{{route('plans')}}"> 
      <div class="card text-center rounded-3">
        <div class="card-body">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi mb-2 text-primary bi-bag-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H2z"/>
            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
          </svg>
          <h6 class="fw-semibold text-secondary">{{__('Invest')}}</h6>
        </div>
      </div>
    </a>
  </div> 
  @endif     
</div>
  
<div class="row">
  @if($hottest)
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card text-center">
      <div class="card-body">
        <h4 class="text-primary fw-semibold mb-3">{{__('Hottest Deal')}}</h4>
        <h5 class="text-uppercase mb-2">{{$hottest->name}} {{__('Plan')}}</h5>
        <h3 class="mb-2">{{$hottest->interest}}% ROI</h3>
        @if($hottest->duration>1)
        <h6 class="text-uppercase text-secondary mb-2">{{__('Duration')}}: {{$hottest->duration}} {{__($hottest->period.'s')}}</h6>
        @else
        <h6 class="text-uppercase text-secondary mb-2">{{$hottest->duration}} {{__($hottest->period)}} {{__('Term')}}</h6>
        @endif
        <h6 class="text-secondary mb-4"> {{__('Capital from')}} <span class="fw-semibold">{{$currency->symbol.number_format($hottest->min_capital)}} {{__('to')}} {{$currency->symbol.number_format($hottest->max_capital)}}</span></h6>
        <div class="d-grid">
          <a class="btn btn-outline-primary" wire:navigate href="{{route('invest', ['plan' => $hottest])}}">{{__('Invest')}}</a>
        </div>
      </div>
    </div>
  </div>
  @endif
  
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card mb-2">
      <div class="card-body">
        <h5 class="card-title text-secondary fw-semibold">{{__('REFER AND EARN')}}</h5>
        <p class="card-text mb-2">{{__('Earn 5% off referred investor\'s first investment')}}.</p>
        <a href="{{ route('referral')}}" wire:navigate class="btn btn-outline-primary">{{__('REFERRALS PAGE')}}</a>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <p class="card-text mb-2"></p>
        <a href="{{ route('profile') }}" wire:navigate class="btn btn-outline-primary">{{__('VIEW PROFILE')}}</a>
      </div>
    </div>
  </div>
  @if($inv)
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-secondary fw-semibold">{{__('Latest Active Investment')}}</h5>
        <h6 class="text-secondary fw-bold mb-2">{{$inv->plan->name}} {{__('Plan')}} ({{$inv->plan->interest}}% {{__('Interest')}})</h6>
        <h6 class="text-secondary fw-bold mb-4"> {{$currency->symbol.number_format($inv->capital)}} {{__('Capital')}}</h6>
        <div class="progress">
          <div class="progress-bar bg-primary" role="progressbar" style="width:{{$progress}}%;" aria-valuenow="{{$progress}}%" aria-valuemin="0" aria-valuemax="100">{{$progress}}%</div>
        </div> 
        <div class="row mt-4 mb-3">
          <div class="col-4">
            <label class="d-flex tx-10 text-uppercase fw-medium">{{__('Start Date')}}</label>
            <h5 class="fw-bold mb-0">{{date("d-m-y", strtotime($inv->start_date))}}</h5>
          </div>
          <div class="col-4">
            <label class="d-flex tx-10 text-uppercase fw-medium">{{__('Interest')}}</label>
            <h5 class="fw-bold mb-0">{{$currency->symbol.number_format($inv->interest)}}</h5>
          </div>
          <div class="col-4">
            <label class="d-flex tx-10 text-uppercase fw-medium">{{__('End Date')}}</label>
            <h5 class="fw-bold mb-0">{{date("d-m-y", strtotime($inv->end_date))}}</h5>
          </div>
        </div>
        @if($inv->autorenewal==0)
        <div class="d-grid mt-2">
          <a wire:click.prevent="autoRenew({{$inv}})" href="#" class="btn btn-primary">
            <span wire:loading.remove>{{__('Autorenew')}}</span> 
            <div wire:loading class="spinner-border spinner-border-sm mx-2 text-success" role="status">
            <span class="sr-only">{{__('Loading...')}}</span>
            </div>
          </a>
        </div>
        @else
        <div class="d-grid mt-2">
          <a wire:click.prevent="cancelRenewal({{$inv}})" href="#" class="btn btn-outline-primary" wire:loading.attr="disabled">
            <span wire:loading.remove>{{__('Cancel Renewal')}}</span>
            <div wire:loading class="spinner-border spinner-border-sm mx-2 text-success" role="status">
              <span class="sr-only">{{__('Loading...')}}</span>
            </div>
          </a>
        </div>
        @endif
      </div>
    </div>
  </div>
  @else
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title text-secondary fw-semibold">{{__('Recent Activity')}}</h6>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <th>{{__('Activity')}}</th>
            <th>{{__('Time')}}</th>
            <tbody>
              @foreach($activities as $activity)
              <tr wire:key="{{ $activity->id }}">
                <td>
                  {{__($activity->activity)}}
                </td>
                <td>
                  {{date("H:ia, d-m-Y", strtotime($activity->created_at))}}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>

</div>
