@extends('layouts.admin')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Items</h1>
        <a href="{{route('backendcategories.create')}}" class="btn btn-primary float-end">Create Category</a>
    </div>
    <ol class="breadcrumb mb-4 ps-4">
        <li class="breadcrumb-item"><a href="{{route('backenddashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('backendcategories.index')}}">Categories</a></li>
        <li class="breadcrumb-item active">Caegory Create</li>
    </ol>
    <div class="card mb-4 m-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Categories List
        </div>
        <div class="card-body">
            <form action="{{route('backendcategories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection