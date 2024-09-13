@extends('components.layouts.email')

@section('content')
<div class="page-content">
    <div class="card">
      <div class="email-body">
          <p>{{$name}}</p>
          <p>{{$email}}</p>
          <p>{{$content}}</p>
      </div>
    </div>
</div>
@endsection