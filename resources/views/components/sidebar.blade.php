<<<<<<< HEAD
<aside class="sidebar">
    <style>
        .sidebar {
            width: 260px;
            background: #fff;
            border-right: 1px solid #e5e5e5;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            margin: 24px;
            padding: 16px;
            font-family: Arial, sans-serif;
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

        .sidebar-profile small {
            color: #777;
            font-size: 12px;
        }

        .sidebar-search input {
            width: 100%;
            padding: 8px 8px 8px 30px;
            border-radius: 8px;
            background: url('/images/search-icon.png') no-repeat 10px center;
            background-size: 15px 15px;
            border: 1px solid #000;
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
            color: #000;
            font-size: 14px;
            border-radius: 8px;
        }

        .sidebar-menu li a:hover,
        .sidebar-bottom li a:hover {
            background: #f2f2f2;
        }

        .text-red {
            color: red;
        }

        .has-dropdown .dropdown-menu {
            display: none;
            padding-left: 20px;
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
            padding-top: 20px;
        }
    </style>

    <div class="sidebar-profile">
        <div class="avatar"></div>
        <div style="display: flex; flex-direction: column;">
            <strong>{{ auth()->user()->name ?? 'Admin1' }}</strong>
            <small>{{ auth()->user()->email ?? 'admin@arei.com' }}</small>
        </div>
    </div>

    <div class="sidebar-search">
        <input type="text" placeholder="Cari">
    </div>

    <ul class="sidebar-menu">
        <li>
            <a href="#">
                <img src="{{ asset('images/menu-dasbor.png') }}" width="16" height="16">
                Dasbor
            </a>
        </li>

        <li>
            <a href="#">
                <img src="{{ asset('images/menu-manajemen-produk.png') }}" width="16" height="16">
                Manajemen Produk
            </a>
        </li>

        <li>
            <a href="#">
                <img src="{{ asset('images/menu-retur.png') }}" width="16" height="16">
                Retur
            </a>
        </li>

        <li>
            <a href="#">
                <img src="{{ asset('images/menu-notif.png') }}" width="16" height="16">
                Notifikasi
            </a>
        </li>

        <li class="has-dropdown">
            <a href="#" class="dropdown-toggle">
                <img src="{{ asset('images/menu-operasional.png') }}" width="16" height="16">
                <span class="text-red">Operasional Gudang</span>
                <span class="arrow">▾</span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Stok Barang</a></li>
                <li><a href="#">Barang Masuk</a></li>
                <li><a href="#">Barang Keluar</a></li>
            </ul>
        </li>

        <li class="has-dropdown">
            <a href="#" class="dropdown-toggle">
                <img src="{{ asset('images/menu-penjualan.png') }}" width="16" height="16">
                Penjualan
                <span class="arrow">▾</span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Data Penjualan</a></li>
                <li><a href="#">Laporan</a></li>
            </ul>
        </li>
    </ul>

    <ul class="sidebar-bottom">
        <li>
            <a href="#">
                <img src="{{ asset('images/menu-bantuan.png') }}" width="16" height="16">
                Bantuan
            </a>
        </li>
        <li>
            <a href="#">
                <img src="{{ asset('images/menu-setting.png') }}" width="16" height="16">
                Pengaturan Akun
            </a>
        </li>
        <li>
            <a href="#">
                <img src="{{ asset('images/menu-logout.png') }}" width="16" height="16">
                Keluar
            </a>
        </li>
    </ul>
</aside>
=======
<aside class="sidebar">
    <style>
        .sidebar {
            height: 100%;
            width: 260px;
            background: #fff;
            border-right: 1px solid #e5e5e5;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            margin: 24px;
            padding: 16px;
            font-family: Arial, sans-serif;
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

        .sidebar { width: 260px; background: #fff; border-right: 1px solid #e5e5e5; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.4); display: flex; flex-direction: column; margin: 24px; padding: 16px; font-family: Arial, sans-serif; }
        .sidebar-profile { display: flex; align-items: center; gap: 10px; margin-bottom: 15px; }
        .avatar { width: 40px; height: 40px; background: #000; border-radius: 50%; }
        .sidebar-profile small { color: #777; font-size: 12px; }
        .sidebar-search input { width: 100%; padding: 8px 8px 8px 30px; border-radius: 8px; background: url('/images/search-icon.png') no-repeat 10px center; background-size: 15px 15px; border: 1px solid #000; margin-bottom: 15px; }
        .sidebar-menu, .sidebar-bottom { list-style: none; padding: 0; margin: 0; }
        .sidebar-menu li a, button, .sidebar-bottom li a { display: flex; align-items: center; gap: 10px; padding: 10px; text-decoration: none; color: #000; font-size: 14px; border-radius: 8px; }
        .sidebar-menu li a:hover, .sidebar-bottom li a:hover { background: #f2f2f2; }
        .sidebar-menu li a.active, .sidebar-bottom li a.active { color: red; font-weight: bold; } /* text-red aktif */
        .has-dropdown .dropdown-menu { display: none; padding-left: 20px; }
        .has-dropdown.active .dropdown-menu { display: block; }
        .arrow { margin-left: auto; }
        .sidebar-bottom { margin-top: auto; border-top: 1px solid #e5e5e5; padding-top: 20px; }
    </style>

    <div class="sidebar-profile">
        <div class="avatar"></div>
        <div style="display: flex; flex-direction: column;">
            <strong>{{ auth()->user()->name ?? 'Admin1' }}</strong>
            <small>{{ auth()->user()->email ?? 'admin@arei.com' }}</small>
        </div>
    </div>

    <div class="sidebar-search">
        <input type="text" placeholder="Cari">
    </div>

    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <img src="{{ asset('images/menu-dasbor.png') }}" width="16" height="16">
                Dasbor
            </a>
        </li>

        <li>
            <a href="{{ route('produk.index') }}" class="{{ request()->is('produk*') ? 'active' : '' }}">
                <img src="{{ asset('images/menu-manajemen-produk.png') }}" width="16" height="16">
                Manajemen Produk
            </a>
        </li>

        <li>
            <a href="#">
                <img src="{{ asset('images/menu-retur.png') }}" width="16" height="16">
                Retur
            </a>
        </li>

        <li class="has-dropdown">
            <a href="{{ route('permintaan.index') }}" class="dropdown-toggle {{ request()->is('permintaan*') || request()->is('penerimaan*') ? 'active' : '' }}">
                <img src="{{ asset('images/menu-operasional.png') }}" width="16" height="16">
                <span class="text-red">Operasional Gudang</span>
                <span class="arrow">▾</span>
            </a>
            
        </li>

        <li class="has-dropdown">
            <a href="#" class="dropdown-toggle">
                <img src="{{ asset('images/menu-penjualan.png') }}" width="16" height="16">
                Penjualan
                <span class="arrow">▾</span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Data Penjualan</a></li>
                <li><a href="#">Laporan</a></li>
            </ul>
        </li>
    </ul>

    <ul class="sidebar-bottom" style="margin-top: 40px;">
        
        
        <li>
           <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" style="border: none; background: none; cursor: pointer;">
        <img src="{{ asset('images/menu-logout.png') }}" width="16" height="16" alt="Logout">
        Keluar
    </button>
</form>

        </li>
    </ul>

    <script>
    // const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    // dropdownToggles.forEach(toggle => {
    //     toggle.addEventListener('click', function(e) {
    //         e.preventDefault(); 
            
    //         const parent = this.parentElement; 
    //         parent.classList.toggle('active');
    //     });
    // });
</script>

</aside>
>>>>>>> 84189c8 (Update model dan blade penerimaan)
