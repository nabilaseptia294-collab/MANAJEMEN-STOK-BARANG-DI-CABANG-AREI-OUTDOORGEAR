<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #DCDCDC;
        }

        .navbar {
            background: #E6091A;
            padding: 18px 0;
            border-bottom: 1px solid #eaeaea;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            padding: 8px 0;
            position: relative;
            transition: color 0.3s;
        }

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="/" >
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 100px; height: auto;">
            </a>

            <ul class="nav-links" id="navLinks">
                <li>
                    <a href="/">Beranda</a>
                </li>
                <li>
                    <a href="/tentang">Tentang</a>
                </li>
                <li>
                    <a href="/layanan">Layanan</a>
                </li>
                <li>
                    <a href="/layanan">Kontak</a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #DCDCDC;
        }

        .navbar {
            background: #E6091A;
            padding: 18px 0;
            border-bottom: 1px solid #eaeaea;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            padding: 8px 0;
            position: relative;
            transition: color 0.3s;
        }

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="/" >
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 100px; height: auto;">
            </a>

            <ul class="nav-links" id="navLinks">
                <li>
                    <a href="/">Beranda</a>
                </li>
                <li>
                    <a href="/tentang">Tentang</a>
                </li>
                <li>
                    <a href="/layanan">Layanan</a>
                </li>
                <li>
                    <a href="/layanan">Kontak</a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>
>>>>>>> 84189c8 (Update model dan blade penerimaan)
</html>