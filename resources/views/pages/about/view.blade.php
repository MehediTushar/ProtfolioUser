@extends('layouts.admin_layouts')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">View all data</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">View</li>
        </ol>        
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Icon</th> 
                <th scope="col">Description</th>
                <th scope="col">Resume</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (count($abouts)>0)
                @foreach ($abouts as $about)
                <tr>
                    <th scope="row">{{ $about->id }}</th>
                    <td>{{ $about->title}}</td>
                    <td>{{ $about->icon}}</td>
                    <td>{{Str::limit(strip_tags($about->description),40)}}</td>
                    <td>{{$about->resume}}</td>
                    <td>
                        <div class="class row">
                            <div class="class col sm 2">
                                <a href="{{route('admin.about.edit', $about->id)}}" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="class col sm 2">
                                <form action="{{route('admin.about.destroy', $about->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                </form>

                            </div>
                        </div>
                    </td>

                  </tr>
                @endforeach
                    
                @endif
                
            </tbody>
    </table> 
    </div>
</main>    
@endsection
