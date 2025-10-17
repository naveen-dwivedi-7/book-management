@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">➕ Add New Book</h3>

    {{-- <!-- Success Message -->
   @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    <!-- Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    {{-- Success message --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span>{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
@endif

{{-- Validation errors --}}
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
@endif


    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Author</label>
                <input type="text" name="author" value="{{ old('author') }}" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>ISBN</label>
                <input type="text" name="isbn" value="{{ old('isbn') }}" class="form-control" required maxlength="13">
                <small class="text-muted">Must be 13 digits and unique</small>
            </div>
            <div class="col-md-4">
                <label>Quantity</label>
                <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control" min="1" required>
            </div>
            <div class="col-md-4">
                <label>Price</label>
                <input type="number" name="price" value="{{ old('price') }}" step="0.01" class="form-control" min="0" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Book</button>
    </form>
</div>
@endsection
