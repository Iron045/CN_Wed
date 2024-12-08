<!-- views/admin/login.php -->
<?php

session_start();  // Đảm bảo rằng session đã được khởi tạo
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');  // Nếu đã đăng nhập, chuyển hướng đến trang dashboard
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Đăng Nhập Admin</h2>

                <!-- Form đăng nhập -->
                <form action="index.php?action=login" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Đăng nhập</button>
</form>

                <!-- Thông báo lỗi nếu có -->
                <?php if (isset($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger mt-3">
                        <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>
</html>
