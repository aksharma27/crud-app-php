@extends('layouts.main')
@push('head')
  <title>CRUD APP | home</title>
@endpush

@section('main-sention')
<div class="container mt-5">
<div class="d-flex justify-content-between align-items-center mb-5">
  <div class="h2">Display All Images</div>
  <a href="{{ route('uploadImage.insertFrom') }}" class="btn btn-primary">Add Image</a>
</div>

  <div class="d-flex justify-content-between align-items-center gap-3 mt-5 flex-wrap">
    @foreach ($AllImages as $image)
      
    
    <div class="card" style="width: 22rem">
      <img src="{{ url('uploads/'.$image['userImage']) }}" alt="" width="100%">
      <div class="card-body">
        <a href="{{ route('uploadImage.edit',$image['id']) }}" class="btn btn-primary w-75 mx-auto d-block mb-3">Update Image</a>
        <a href="{{ route('uploadImage.delete',$image['id']) }}" class="btn btn-primary w-75 mx-auto d-block">Delete Image</a>
      </div>
    </div>
    @endforeach
  </div>
</div>


@endsection