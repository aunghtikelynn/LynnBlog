@extends('layouts.admin')
@section('content')
    <!-- Page content-->
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <a href="{{route('backendposts.create')}}" class="btn btn-primary float-end">Create Post</a>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('backenddashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Posts</li>
        </ol>
        
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Posts List
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php 
                            $i = 1;
                        @endphp
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->image}}</td>
                                <td>{{$post->description}}</td>
                                <td>{{$post->category_id}}</td>
                                <td>{{$post->user_id}}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection