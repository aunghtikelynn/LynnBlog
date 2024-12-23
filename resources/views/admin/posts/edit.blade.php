@extends('layouts.admin')
@section('content')
    <!-- Page content-->
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <a href="{{route('backend.posts.index')}}" class="btn btn-danger float-end">Cancel</a>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('backend.posts.index')}}">Posts</a></li>
            <li class="breadcrumb-item active">Edit Post</li>
        </ol>
        
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Posts List
            </div>
            <div class="card-body">
                <form action="{{route('backend.posts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$post->title}}" id="title" name="title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categories</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                            <option value="" selected>Choose ...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$post->category_id == $category->id ? 'selected':''}}>{{$category->name}}</option>
                            @endforeach
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message}} </div>
                            @enderror
                        </select>
                    </div>
                    <!-- <input type="text" class="hidden" value=""> -->
                    <div class="mb-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Image</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Image</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <img src="{{$post->image}}" alt="" class="w-25 h-25 my-3">
                                <input type="hidden" name="olg_image" id="" value="{{$post->image}}"> 
                            </div>
                            <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                                <input type="file" accept="image/*" class="form-control my-3 @error('image') is-invalid @enderror" value="{{old('image')}}" id="image" name="image">
                            </div>
                        </div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="2">{{$post->description}}</textarea>
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