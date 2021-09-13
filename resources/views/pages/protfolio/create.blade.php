@extends('layouts.admin_layouts')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{ route('admin.protfolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT')}}
            <div class="row">
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="title"><h4>Title</h4></label>
                    <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-5">
                        <label for="description"><h4>Description</h4></label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-5">
                        <label for="icon"><h4>Icon</h4></label>
                        <input type="text" class="form-control" id="icon" name="icon">
                    </div>
                    <div class="form-group col-md-3 mt-3">
                        <h3>Big Image</h3>
                    <img style="height: 30vh" src="{{ asset('assets/img/big_img.png') }}" class="img-thumbnail">
                        <input class="mt-3" type="file" name="big_img">
                    </div>
                    <div class="form-group col-md-3 mt-3">
                        <h3>Small Image</h3>
                        <img style="height: 20vh" src="{{ asset('assets/img/small_img.png') }}" class="img-thumbnail">
                        <input class="mt-3" type="file" name="small_img">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary mt-5">
        </div>
        </form>
    </div>
</main>    
@endsection
