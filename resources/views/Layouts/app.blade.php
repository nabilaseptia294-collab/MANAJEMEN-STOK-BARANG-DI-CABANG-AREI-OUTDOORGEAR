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
    <style>
        .navbar-arei {
            background-color: #E6091A; 
            color: #fff;
            font-weight: bold;
}
        /* Sidebar default */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #f7e9e9e9;
            border-right: 1px solid #ddd;
            transition: all 0.3s;
        }
        .sidebar.collapsed {
            width: 70px;
        }
        .sidebar .menu li a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            transition: background 0.2s;
        }
        .sidebar .menu li.active a,
        .sidebar .menu li a:hover {
            background-color: #f8d7da;
            color: #E6091A;
            border-radius: 5px;
        }
        .sidebar .menu li a i {
            width: 25px;
            text-align: center;
        }
        .sidebar-profile .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #ddd;
        }
        @media(max-width: 768px){
            .sidebar {
                position: absolute;
                left: -250px;
                z-index: 1000;
            }
            .sidebar.show {
                left: 0;
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-arei px-4">
    <span class="navbar-brand">AREI OUTDOOR GEAR</span>
</nav>

<div class="d-flex">

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-profile mb-3 p-3">
            <div class="avatar mb-2"></div>
            <div class="profile-info dropdown">
                <strong class="dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown">
                    {{ auth()->user()->name ?? 'Admin' }}
                </strong>
                <small>{{ auth()->user()->email ?? '-' }}</small>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="#">Profil</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>
                </ul>
            </div>
        </div>

        <input type="text" class="form-control mb-3" placeholder="Cari..." id="sidebarSearch">

        <ul class="menu list-unstyled">
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="fa-solid fa-table-columns"></i> <span class="ms-2">Dasbor</span></a>
            </li>
            <li class="{{ request()->is('permintaan*') ? 'active' : '' }}">
                <a href="{{ route('permintaan.index') }}"><i class="fa-solid fa-box"></i> <span class="ms-2">Permintaan Stok</span></a>
            </li>
            <li class="{{ request()->is('produk*') ? 'active' : '' }}">
                <a href="#"><i class="fa-solid fa-boxes-stacked"></i> <span class="ms-2">Manajemen Produk</span></a>
            </li>
            <li><a href="#"><i class="fa-solid fa-arrow-rotate-left"></i> <span class="ms-2">Retur</span></a></li>
        </ul>
    </aside>

    <!-- Konten Halaman -->
    <main class="content p-4 w-100">
        @yield('content')
    </main>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle sidebar di mobile
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('show');
    });

    // Filter menu search
    const searchInput = document.getElementById('sidebarSearch');
    searchInput.addEventListener('keyup', function(){
        const filter = this.value.toLowerCase();
        const items = sidebar.querySelectorAll('.menu li');
        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
</body>
</html>
