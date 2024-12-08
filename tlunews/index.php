<?php
// views/home/index.php

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - NewsFlash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>TLU News</h1>
                <p>Trang tin tức mới nhất</p>
                <!-- Liên kết tới trang người dùng -->
                <a href="views/home/index.php" class="btn btn-primary">Người Dùng</a>
                <!-- Liên kết tới trang đăng nhập admin -->
                <a href="views/admin/login.php" class="btn btn-secondary">Đăng Nhập Admin</a>
            </div>
        </div>
    </div>
</body>
</html>
