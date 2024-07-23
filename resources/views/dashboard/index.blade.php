

@extends('layouts/app')
@section('title', 'Dashboard')

@section('content')

<div class="card-body p-0">
    <div class="info-box">
        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Users</span>
          <span class="info-box-number">{{ $userCount }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
  </div>

@endsection