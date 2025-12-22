<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>AREI OUTDOOR GEAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/arei.css') }}">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger px-4">
    <span class="navbar-brand">AREI OUTDOOR GEAR</span>
</nav>

<div class="d-flex">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-profile mb-3 p-3">
            <div class="avatar mb-2"></div>
            <div class="profile-info">
                <strong>{{ auth()->user()->name ?? 'Admin AREI' }}</strong>
                <small>{{ auth()->user()->email ?? '-' }}</small>
            </div>
        </div>

        <input type="text" class="form-control mb-3" placeholder="Cari">

        <ul class="menu list-unstyled">

            <!-- DASHBOARD -->
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-table-columns"></i> Dasbor
                </a>
            </li>

            <!-- PERMINTAAN STOK (FIX DI SINI) -->
            <li class="{{ request()->is('permintaan-stok*') ? 'active' : '' }}">
                <a href="{{ route('permintaan-stok.index') }}">
                    <i class="fa-solid fa-box"></i> Permintaan Stok
                </a>
            </li>

            <!-- PRODUK (FIX LINK) -->
            <li class="{{ request()->is('produk*') ? 'active' : '' }}">
                <a href="{{ route('produk.index') }}">
                    <i class="fa-solid fa-boxes-stacked"></i> Manajemen Produk
                </a>
            </li>

            <!-- RETUR (DUMMY) -->
            <li>
                <a href="#">
                    <i class="fa-solid fa-arrow-rotate-left"></i> Retur
                </a>
            </li>

        </ul>
    </aside>

    <!-- Konten -->
    <main class="content p-4 w-100">
        @yield('content')
    </main>

</div>

</body>
</html>
