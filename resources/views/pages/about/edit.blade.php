@extends('layouts.admin_layouts')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <form action="{{ route('admin.about.update', $abouts->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-4 mt-3">
                        <div class="mb-3">
                            <label for="title"><h4>Title</h4></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $abouts->title}}">
                        </div>

                        <div class="mb-5">
                            <label for="icon"><h4>Icon</h4></label>
                            <input type="text" class="form-control" id="icon" name="icon" value="{{ $abouts->icon}}">
                        </div>
                    </div>
                    <div class="form-group col-md-6 mt-3">
                    <h3>Description</h3>
                    <textarea class="form-control" id="description" name="description" rows="5">{{($abouts->description)}}</textarea>
                </div>

                    <div>

                        <h4>Upload Resume</h4>
                        <input class="mt-2" type="file" id="resume" name="resume">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary mt-4">
        </div>
        </form>
    </div>
</main>    
@endsection
