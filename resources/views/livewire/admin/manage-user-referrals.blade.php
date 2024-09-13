<div>
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a wire:navigate href="{{route('users')}}">Investors</a></li>
      <li class="breadcrumb-item"><a wire:navigate href="{{route('user.manage', $user->id)}}">{{$user->first_name.' '.$user->last_name}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">Investments</li>
    </ol>
  </nav>
  
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title fw-semibold">{{$user->first_name.' '.$user->last_name}} REFERRAL EARNINGS</h6>
          @if(!$referral_earnings)
          <p>{{$user->first_name.' '.$user->last_name}} has not referred any investing investor.</p>
          @else
          <div class="table-responsive">
            <table id="dataTable" class="table table-hover">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Amount</th>
                  <th>user</th>
                  <th>Referee</th>
                  <th>Investment</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach($earnings as $k=>$earning)
                <tr wire:key={{$earning->id}}>
                  <td>{{++$k}}.</td>
                  <td>{{$currency->symbol.number_format($earning->amount)}}</td>
                  <td>{{$earning->user->first_name. ' ' .$earning->user->last_name}}</td>
                  <td>{{$earning->investment->user->first_name. ' ' .$earning->investment->user->last_name}}</td>
                  <td>{{$earning->investment->ref}}</td>
                  <td>{{date("d-m-y", strtotime($earning->created_at))}}</td>
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
  