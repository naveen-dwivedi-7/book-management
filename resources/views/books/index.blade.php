@extends('layouts.dashboard')

@section('content')
<h3>📖 Book Details</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered mt-4">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price (₹)</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @forelse($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->isbn }}</td>
            <td>{{ Str::limit($book->description, 50) }}</td>
            <td>{{ $book->quantity }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->created_at->format('d M Y') }}</td>
        </tr>
        @empty
        <tr><td colspan="8" class="text-center text-muted">No books found.</td></tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {!! $books->links('pagination::bootstrap-5') !!}
</div>
@endsection
