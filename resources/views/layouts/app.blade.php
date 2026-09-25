<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow Pro</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .sidebar { width: 280px; min-height: 100vh; background: #0f172a; color: #fff; }
        .sidebar .nav-link { color: #94a3b8; border-radius: 8px; margin-bottom: 5px; transition: all 0.2s; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: #4f46e5; color: #fff; }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-4 d-none d-lg-block">
        <div class="d-flex align-items-center gap-2 mb-4 pb-3 border-bottom border-secondary">
            <div class="bg-indigo p-2 rounded-3 text-white" style="background: #4f46e5;">
                <i class="bi bi-layers-fill fs-5"></i>
            </div>
            <h5 class="fw-bold mb-0 text-white">TaskFlow</h5>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ url('/tasks') }}" class="nav-link active px-3 py-2.5 fw-semibold d-flex align-items-center gap-3">
                    <i class="bi bi-grid-1x2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/tasks/create') }}" class="nav-link px-3 py-2.5 fw-semibold d-flex align-items-center gap-3">
                    <i class="bi bi-plus-square"></i> New Task
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="flex-grow-1">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4 py-3">
            <div class="container-fluid">
                <span class="navbar-brand fw-bold text-dark fs-5">Workspace Overview</span>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                        <i class="bi bi-calendar3 me-1"></i> {{ date('F d, Y') }}
                    </span>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="p-4 p-md-5">
            @yield('content')
        </main>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>