@extends('layouts.admin')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Items</h1>
        <a href="{{route('backendcategories.index')}}" class="btn btn-danger float-end">Cancel</a>
    </div>
    <ol class="breadcrumb mb-4 ps-4">
        <li class="breadcrumb-item"><a href="{{route('backenddashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('backendcategories.index')}}">Categories</a></li>
        <li class="breadcrumb-item active">Edit Caegory</li>
    </ol>
    <div class="card mb-4 m-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Categories
        </div>
        <div class="card-body">
            <form action="{{route('backendcategories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}" id="name" name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection