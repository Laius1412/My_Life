<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Header -->
        <div class="text-center mb-4" style="background-color: rgb(251, 167, 167)">
            <h1 class="display-4">{{ $title }}</h1>
            <p class="lead">{{ $message }}</p>
        </div>

        <!-- Card Section -->
        <div class="row"  style="min-height: 400px">
            <!-- Nhật ký -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Nhật ký</h5>
                        <p class="card-text">Ghi lại những cảm xúc và kỷ niệm đáng nhớ trong ngày.</p>
                        <a href="#" class="btn btn-primary">Xem nhật ký</a>
                    </div>
                </div>
            </div>
            <!-- Ảnh kỷ niệm -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Ảnh kỷ niệm</h5>
                        <p class="card-text">Lưu giữ những khoảnh khắc đẹp qua những bức ảnh.</p>
                        <a href="#" class="btn btn-primary">Xem ảnh</a>
                    </div>
                </div>
            </div>
            <!-- Thành tựu -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Thành tựu</h5>
                        <p class="card-text">Danh sách những mục tiêu đã hoàn thành và thành tựu đạt được.</p>
                        <a href="#" class="btn btn-primary">Xem thành tựu</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center mt-5" style="background-color: rgb(98, 97, 97); min-height: 200px; display: flex; flex-direction: column; justify-content: flex-end; align-items: center;">
            <p style="color: white; margin: 0;">Được phát triển bởi Thành Đạt</p>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
