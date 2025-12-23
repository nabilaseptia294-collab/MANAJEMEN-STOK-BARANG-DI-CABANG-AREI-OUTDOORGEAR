<!DOCTYPE html>
<<<<<<< HEAD:resources/views/layouts/app.blade.php
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SISTEM MANAJEMEN STOK AREI OUTDOOR GEAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
        }

        .navbar-arei {
            background-color: #E6091A;
            color: #fff;
            font-weight: bold;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            margin: 24px;
            padding: 16px;
            display: flex;
            flex-direction: column;
            min-height: calc(100vh - 48px);
        }

        .sidebar-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            background: #000;
            border-radius: 50%;
        }
        .sidebar-menu li a i {
             width: 25px;         /* Berikan lebar tetap pada ikon */
             text-align: center;   /* Pastikan ikon berada di tengah lebar tersebut */
             display: inline-block;
        }
        .sidebar-profile small {
            color: #777;
            font-size: 12px;
        }

        .sidebar-search {
            margin-bottom: 15px;
        }

        .sidebar-menu,
        .sidebar-bottom {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li a,
        .sidebar-bottom li a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .sidebar-menu li a:hover,
        .sidebar-menu li.active > a {
            background: #f8d7da;
            color: #E6091A;
        }

        .has-dropdown .dropdown-menu {
            display: none;
            padding-left: 25px;
        }

        .has-dropdown.active .dropdown-menu {
            display: block;
        }

        .arrow {
            margin-left: auto;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid #e5e5e5;
            padding-top: 15px;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-arei px-4">
    <span class="navbar-brand">SISTEM MANAJEMEN STOK AREI OUTDOOR GEAR</span>
</nav>

<div class="d-flex">

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">

        <div class="sidebar-profile">
            <div class="avatar"></div>
            <div class="d-flex flex-column">
                <strong>{{ auth()->user()->name ?? 'Admin' }}</strong>
                <small>{{ auth()->user()->email ?? '-' }}</small>
            </div>
        </div>

        <div class="sidebar-search">
            <input type="text" class="form-control" placeholder="Cari menu..." id="sidebarSearch">
        </div>

        <ul class="sidebar-menu">

            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-table-columns"></i>
                    Dashboard
                </a>
            </li>

            <li class="{{ request()->is('produk*') ? 'active' : '' }}">
                <a href="{{ route('produk.index') }}">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    Manajemen Produk
                </a>
            </li>

            <li class="{{ request()->is('retur*') ? 'active' : '' }}">
                <a href="{{ route('retur.index') }}">
                    <i class="fa-solid fa-right-left"></i>
                    Retur 
                </a>
            </li>

            <li class="{{ request()->is('permintaan*') ? 'active' : '' }}">
                <a href="{{ route('permintaan.index') }}">
                    <i class="fa-solid fa-box"></i>
                    Permintaan
                </a>
            </li>

            <li class="{{ request()->is('penerimaan*') ? 'active' : '' }}">
                <a href="#"> 
            <i class="fa-solid fa-truck-ramp-box fixed-width"></i>
            <span>Penerimaan Stok</span>
                </a>
            </li>

    </aside>

    <!-- CONTENT -->
    <main class="content p-4 w-100">
        @yield('content')
    </main>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Dropdown sidebar
    document.querySelectorAll('.dropdown-toggle').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            this.parentElement.classList.toggle('active');
        });
    });

    // Search menu
    const searchInput = document.getElementById('sidebarSearch');
    searchInput.addEventListener('keyup', function () {
        const filter = this.value.toLowerCase();
        document.querySelectorAll('.sidebar-menu li').forEach(item => {
            item.style.display = item.textContent.toLowerCase().includes(filter) ? '' : 'none';
        });
    });
</script>

=======
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App')</title>
</head>
<body>
    @yield('content')
>>>>>>> 84189c8 (Update model dan blade penerimaan):resources/views/Layouts/app.blade.php
</body>
</html>
