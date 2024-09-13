@extends('components.layouts.email')

@section('content')
<div class="page-content">
    <div class="card">
      <div class="email-body">
          <p>{!!$content!!}</p>
          <br>
          <p><strong>{{__('Regards')}}</strong>,<br> {{$site->name}}</p>
      </div>
    </div>
</div>
@endsection