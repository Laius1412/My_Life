<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Life - Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}"> <!-- Đường dẫn đến file CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
        <div class="box">
            <div class="img-cover">
                <img src="{{ asset('img/avatar.jpg') }}" alt="Ava" class="img-ava">
            </div>
            <a href="https://www.facebook.com/laius1108" target="_blank" class="social">
                <i class="fab fa-facebook-f"></i> Facebook
            </a>
            <a href="https://www.instagram.com/laius4teen/" target="_blank" class="social">
                <i class="fab fa-instagram"></i> Instagram
            </a>
            <a href="https://mail.google.com/mail/u/0/#inbox" class="social">
                <i class="fas fa-envelope"></i> Email
            </a>
            <a href="https://zalo.me" target="_blank" class="social">
                <i class="fas fa-comments"></i> Zalo
            </a>
            <a href="https://github.com/Laius1412" target="_blank" class="social">
                <i class="fab fa-github"></i> Github
            </a>
        </div>
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/homepage.js"></script> <!-- Đường dẫn đến file JS -->
</body>
</html>
