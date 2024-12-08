<!-- views/admin/dashboard.php -->
<?php
require_once 'config/database.php';
require_once 'models/News.php';
require_once 'models/User.php';
require_once 'models/Category.php';

// Bắt đầu phiên làm việc với session
session_start();

// Kiểm tra nếu chưa đăng nhập (nghĩa là $_SESSION['user_id'] chưa được thiết lập)
if (!isset($_SESSION['user_id'])) {
    // Chuyển hướng người dùng về trang đăng nhập (login.php)
    header('Location: login.php');
    exit();  // Dừng thực thi tiếp theo để tránh hiển thị nội dung trái phép
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h2>Trang Quản Trị</h2>
        <p>Chào mừng bạn, <?php echo $_SESSION['username']; ?>!</p>
        
        <h3>Danh sách tin tức</h3>
        
        <!-- Kiểm tra nếu có tin tức -->
        <?php if (empty($newsList)): ?>
            <p>Hiện tại không có tin tức nào.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Danh Mục</th>
                        <th>Ngày Tạo</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Duyệt qua danh sách tin tức -->
                    <?php foreach ($newsList as $news): ?>
                        <tr>
                            <td><?php echo $news['id']; ?></td>
                            <td><?php echo htmlspecialchars($news['title']); ?></td>
                            <td><?php echo htmlspecialchars($news['category_id']); ?></td>
                            <td><?php echo $news['created_at']; ?></td>
                            <td>
                                <a href="index.php?action=editNews&id=<?php echo $news['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="index.php?action=deleteNews&id=<?php echo $news['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <a href="index.php?action=addNews" class="btn btn-primary">Thêm Tin Tức</a>
    </div>

</body>
