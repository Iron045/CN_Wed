<?php
require_once '../config/database.php';
require_once '../models/News.php';

// Lấy ID bài viết từ URL
$newsId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Kiểm tra ID hợp lệ
if ($newsId > 0) {
    $news = new News();
    $newsItem = $news->getNewsById($newsId); // Đảm bảo bạn truyền tham số đúng
} else {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Trang Tin Tức</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Đăng Nhập</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container mt-4">
        <?php if ($newsItem): ?>
            <h1 class="mb-4"><?php echo htmlspecialchars($newsItem['title']); ?></h1>
            <p><strong>Ngày đăng:</strong> <?php echo date('d/m/Y', strtotime($newsItem['created_at'])); ?></p>

            <?php if (!empty($newsItem['image'])): ?>
                <img src="<?php echo htmlspecialchars($newsItem['image']); ?>" class="img-fluid mb-4" alt="<?php echo htmlspecialchars($newsItem['title']); ?>">
            <?php endif; ?>

            <div class="content">
                <p><?php echo nl2br(htmlspecialchars($newsItem['content'])); ?></p>
            </div>
        <?php else: ?>
            <p>Bài viết không tồn tại hoặc đã bị xóa.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p>&copy; 2024 Trang Tin Tức. Tất cả quyền được bảo lưu.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
