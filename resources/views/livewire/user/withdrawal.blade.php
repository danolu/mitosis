<div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="mb-4">
        @if(($user->bank_name && $user->bank_account_number) || $user->paypal || $user->wallet_address)
        <div class="mb-4 d-flex justify-content-between">
          <h3><a href="{{route('withdraw')}}" class="btn btn-outline-primary" wire:navigate>{{__('Withdraw')}} </a></h3>    
          <h3><a href="{{route('withdrawal-details')}}" wire:navigate class="btn btn-outline-primary">{{__('Update Withdrawal Details')}} </a></h3>
        </div>
        @else
        <h3 class="my-4 text-center">
          <a href="{{route('withdrawal-details')}}" wire:navigate class="btn btn-primary">{{__('Add Withdrawal Details')}} </a>
        </h3>
        @endif

        @if (count($withdrawals))
        <h6 class="card-title fw-semibold">{{__('Withdrawal Log')}}</h6>
        <div class="table-responsive">
          <table id="dataTable" class="table table-hover">
            <thead>
              <tr>
                <th>{{__('Amount')}}</th>
                <th>{{__('Status')}}</th>
                <th>{{__('Date')}}</th>
                <th>{{__('Reference')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($withdrawals as $withdrawal)
              <tr wire:key="{{ $withdrawal->id }}">
                <td>${{$withdrawal->amount}}</td>
                @if($withdrawal->status==0)
                <td><span class="badge rounded-pill text-bg-info">{{__('Pending')}}</span></td>
                @elseif($withdrawal->status==1)
                <td><span class="badge rounded-pill text-bg-success">{{__('Approved')}}</span></td>
                @else
                <td><span class="badge rounded-pill text-bg-danger">{{__('Declined')}}</span></td>
                @endif
                <td>{{date("d-m-y", strtotime($withdrawal->created_at))}}</td>
                <td>{{$withdrawal->ref}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

</div>
