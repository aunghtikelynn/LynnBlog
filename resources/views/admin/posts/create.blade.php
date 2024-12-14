@extends('layouts.admin')
@section('content')
    <!-- Page content-->
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <a href="" class="btn btn-primary float-end">Create Post</a>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('backenddashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('backendposts.index')}}">Posts</a></li>
            <li class="breadcrumb-item active">Create Post</li>
        </ol>
        
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Posts List
            </div>
            <div class="card-body">
                <form action="{{route('backendposts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" id="title" name="title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categories</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                            <option value="" selected>Choose ...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected':''}}>{{$category->name}}</option>
                            @endforeach
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message}} </div>
                            @enderror
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <input class="form-control @error('user_id') is-invalid @enderror" value="{{old('user_id')}}" type="text" id="user_id" name="user_id">
                        @error('user_id')
                            <div class="invalid-feedback">{{ $message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" accept="image/*" type="file" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="2">{{old('description')}}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message}} </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection