<div>
  <div class="card highlight">
    <div class="card-body">
      @if ($count_ref)
      <p class="card-text mb-2">@if($count_ref!=1) {{__('You have earned refs', ['ref_count' => $count_ref,'ref_earnings' => $currency->symbol.$ref_earnings])}} @else {{__('You have earned ref', ['ref_count' => $count_ref,'ref_earnings' => $currency->symbol.$ref_earnings])}} @endif</p>
      @else
      <p class="card-text mb-2">{{__('You are yet to earn through our referrals programme.')}}</p>
      @endif
      <p>
        {{__('Refer an investor with your affiliate link and earn 5% off their first investment.')}} <br>
        <span id="ref_link" class="text-primary">
          {{url()->current().'/'.$user->username}}
        </span> 
        <button type="button" class="btn btn-clipboard" data-clipboard-target="#ref_link">
          <i data-feather="copy"></i> 
        </button>
      </p>
    </div>
  </div>

  @if ($count_ref)
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">{{__('Referral Earnings')}}</h6>
          <div class="table-responsive">
            <table id="dataTableExample" class="table table-hover">
              <thead>
                <tr>
                  <th>{{__('Amount')}}</th>
                  <th>{{__('Date')}}</th>
                  <th>{{__('Reference')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($earnings as $ref)
                <tr wire:key="{{ $ref->id }}">
                  <td>{{$ref->amount}}</td>
                  <td>{{date("d-m-y H:i", strtotime($ref->created_at))}}</td>
                  <td>{{$ref->ref}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
