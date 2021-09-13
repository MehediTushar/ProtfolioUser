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
                <th scope="col">Big Image</th>
                <th scope="col">Small Image</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (count($protfolios)>0)
                @foreach ($protfolios as $protfolio)
                <tr>
                    <th scope="row">{{ $protfolio->id }}</th>
                    <td>{{ $protfolio->title}}</td>
                    <td>{{ $protfolio->icon}}</td>
                    <td><img style="height: 10vh" src="{{url($protfolio->big_img)}}" alt="big_image"></td>
                    <td><img style="height: 10vh" src="{{url($protfolio->small_img)}}" alt="small_image"></td>
                    <td>{{Str::limit(strip_tags($protfolio->description),40)}}</td>
                    <td>
                        <div class="class row">
                            <div class="class col sm 2">
                                <a href="{{route('admin.protfolio.edit', $protfolio->id)}}" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="class col sm 2">
                                <form action="{{route('admin.protfolio.destroy', $protfolio->id)}}" method="post">
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
