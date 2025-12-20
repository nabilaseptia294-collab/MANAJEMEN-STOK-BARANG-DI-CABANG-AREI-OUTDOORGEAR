<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login') - AREI Outdoor</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS AREI -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-login {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        .btn-arei {
            background-color: #d32f2f;
            color: white;
        }
        .btn-arei:hover {
            background-color: #b71c1c;
            color: white;
        }
        .logo-arei {
            font-weight: bold;
            font-size: 24px;
            color: #d32f2f;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        @yield('content')
    </div>

</body>
</html>
