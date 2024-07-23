@extends('layouts/app')
@section('title', 'Anggota')

@section('content')
{{-- Notifikasi eror --}}
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
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="POST">
      @csrf
      <div class="card-body">
        
        <div class="form-group">
          <label>Nama User</label>
          <select class="form-control" name="user_id">
            <option value="">Pilih Nama User</option>
            @foreach($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
        
        <div class="form-group">
          <label>Caption</label>
          <input type="text" class="form-control" id="caption" name="caption" placeholder="Enter caption">
        </div>

        <div class="form-group">
          <label>File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image">
              <label class="custom-file-label" for="image">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
        </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Upload Post</button>
      </div>
    </form>
  </div>
@endsection
