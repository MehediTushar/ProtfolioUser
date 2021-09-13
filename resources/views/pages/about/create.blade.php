@extends('layouts.admin_layouts')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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

                    <div>
                        <h4>Upload Resume</h4>
                        <input class="mt-2" type="file" id="resume" name="resume">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary mt-5">
        </div>
        </form>
    </div>
</main>    
@endsection
