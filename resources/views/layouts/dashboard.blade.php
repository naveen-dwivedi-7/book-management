<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Book Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { overflow-x: hidden; }
        .sidebar {
            height: 100vh;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: white;
            padding-top: 60px;
        }
        .sidebar a {
            color: white;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active { background-color: #495057; }
        .content { margin-left: 220px; padding: 20px; }
        .navbar-custom { margin-left: 220px; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark fixed-top navbar-custom">
    <div class="container-fluid">
        <form class="d-flex me-auto" method="GET" action="{{ route('books.index') }}">
    <input class="form-control me-2" type="search" name="search" placeholder="Search books..." aria-label="Search" value="{{ request('search') }}">
    <button class="btn btn-outline-dark" type="submit">Search</button>
</form>

        <span class="text-white">{{ session('user')['name'] ?? '' }}</span>
    </div>
</nav>

<div class="sidebar">
    <h5 class="text-center mb-4">📚 Book Manager</h5>
    <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">➕ Add Book</a>
    <a href="{{ route('books.index') }}" class="{{ request()->is('books') ? 'active' : '' }}">📖 Book Details</a>
    <a href="{{ route('logout') }}">🚪 Logout</a>
</div>

<div class="content mt-5 pt-3">
    @yield('content')
</div>

</body>
</html>
