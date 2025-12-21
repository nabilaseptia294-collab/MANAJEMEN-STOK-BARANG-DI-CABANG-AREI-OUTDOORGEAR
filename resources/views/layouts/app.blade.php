<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>AREI - Manajemen Stok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body { font-family: Arial, sans-serif; margin:0; background:#f4f4f4; }
        .sidebar { width:220px; background:#fff; min-height:100vh; padding:20px; }
        .header { background:#c62828; color:white; padding:15px; }
        .content { padding:25px; flex:1; }
        a { text-decoration:none; color:#333; }
        .btn-red { background:#c62828; color:white; padding:10px 16px; border-radius:6px; }
    </style>
</head>
<body>

<div class="header">
    <b>AREI Outdoor Gear</b>
</div>

<div style="display:flex">
    <div class="sidebar">
        <a href="/produk">📦 Manajemen Produk</a>
    </div>

    <div class="content">
        @yield('content')
    </div>
</div>

</body>
</html>
