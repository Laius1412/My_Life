<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Life')</title> <!-- Tiêu đề mặc định là 'My Website' -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}"> <!-- Đường dẫn đến file CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="img/image.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                        <a class="nav-link text-nav" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="{{ route('todo') }}">To-do List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="{{ route('time-table') }}">Time-table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="{{ route('achievement') }}">Memories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="{{ route('diary') }}">Diary</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main">
        <div id="loadingOverlay" style="display: none;">
        <div class="loading-spinner"></div>
        </div>
        @yield('content') <!-- Nội dung của từng trang con -->
    </div>
    <!-- Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hiển thị lớp phủ loading khi bắt đầu tải trang
            window.addEventListener("beforeunload", function() {
                document.getElementById("loadingOverlay").style.display = "flex";
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/homepage.js"></script> <!-- Đường dẫn đến file JS -->
</body>
</html>
