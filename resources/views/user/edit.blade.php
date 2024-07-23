

@extends('layouts/app')
@section('title', 'User')

@section('content')
@if($errors->any()) 
  <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
      <li class="py-5 bg-red-500 text-white font-bold">{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit User</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('user.update', $user) }}"  method="POST">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label>email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="password">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm password">
          </div>
        
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Edit user</button>
      </div>
    </form>
  </div>

@endsection
