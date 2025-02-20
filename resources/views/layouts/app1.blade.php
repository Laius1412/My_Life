<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Life')</title> <!-- Tiêu đề mặc định -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="img/image.png" type="image/x-icon">

    <style>
        body {
            background-color: #8dbffb !important;
        }

        /* Header */
        .bg-primary {
            background-color: #8dbffb !important;
        }

        /* Thanh navbar */
        .bg-light-blue {
            background-color: #f6f9fb !important;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Đổ bóng phía dưới */
        }

        .text-nav {
            color: #7aace8;
        }

        .navbar-nav .nav-link {
            text-align: center;
            padding: 10px 15px;
            margin-left: 10px;
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #f9503d !important;
        }

        /* Phần nội dung */
        .main {
            background-color: #bfe0f6 !important;
            width: 100%;
            min-height: 550px;
            padding-top: 50px;
            padding-bottom: 30px;
            overflow: hidden;
        }

        .box {
            min-height: 300px;
            width: 450px;
            background-color: #f6f9fb;
            border-radius: 20px;
            justify-self: center;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .img-cover .img-ava {
            width: 100%;
            height: 500px;
            border-radius: 20px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .img-cover {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: hidden;
            border-radius: 20px;
            margin-bottom: 10px;
        }

        .box .img-cover::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 15%;
            background: linear-gradient(to top, rgba(255, 255, 255, 1), rgba(186, 184, 184, 0));
            pointer-events: none;
            transition: height 0.1s ease, background 0.3s ease;
        }

        .img-cover:hover::after {
            height: 10%;
            background: linear-gradient(to top, rgba(255, 255, 255, 1), rgba(237, 237, 237, 0.5), rgba(255, 255, 255, 0));
        }

        .img-cover:hover {
            cursor: pointer;
            overflow: hidden;
        }

        .img-cover:hover>.img-ava {
            transform: scale(1.1);
        }

        /* Định dạng thẻ a (social) */
        .social {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 90%;
            padding: 15px 15px;
            margin: 10px 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            color: #333;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Biểu tượng Font Awesome */
        .social i {
            margin-right: 10px;
            font-size: 20px;
        }

        /* Hiệu ứng hover */
        .social:hover {
            color: #3dabf9;
            border-color: #3dabf9;
            box-shadow: 0 4px 8px rgba(61, 161, 249, 0.3);
            transform: translateY(-3px);
        }

        .social:focus {
            outline: none;
        }

        #loadingOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.6);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loading-spinner {
            border: 8px solid #fbfafa;
            border-top: 8px solid #84cbfa;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
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
