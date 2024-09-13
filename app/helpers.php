<?php
  
function active_class($path, $active = 'active') {
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

function progress($start, $end) {
  $now = Carbon\Carbon::now();
  $start_date = Carbon\Carbon::parse($start);
  $end_date = Carbon\Carbon::parse($end);
  $moved_hours = $now->diffInHours(Carbon\Carbon::parse($start_date));
  $total_hours = $end_date->diffInHours($start_date);
  return floor(100*$moved_hours/$total_hours);
}