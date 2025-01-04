<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Life - Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}"> <!-- Đường dẫn đến file CSS -->
</head>
<body>
    <!-- Header -->
    <header class="bg-primary text-white text-center py-3">
        <img src="{{ asset('img/logopage.png') }}" alt="Logo" style="width: 150px; height: 80px;">
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light-blue">
        <div class="container">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="#">To-do List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="#">Time-table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="#">Achievement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="#">Diary</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Nội dung -->
    <div class="main">

    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/homepage.js"></script> <!-- Đường dẫn đến file JS -->
</body>
</html>
