@extends('layouts.main')
@push('head')
    <title>CRUD | insert form</title>
@endpush

@section('main-sention')
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="h2">Upload Image on Server</div>
            <a href="{{ route('uploadImage.display') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="row mt-5">
            <div class="col-10 col-md-7 mx-auto card mt-5">
                <div class="card-body">
                    <form action="{{ route('uploadImage.upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="" class="form-label">Select Image</label>
                        <input type="file" name="userImage" class="form-control">
                        <button class="btn btn-primary btn-lg mt-3">Upload Image</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
