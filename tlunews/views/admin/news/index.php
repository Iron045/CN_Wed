<!-- admin/news/index.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tin Tức - Quản Trị NewsFlash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2>Danh Sách Tin Tức</h2>
        
        <!-- Nút Thêm Tin Tức -->
        <a href="?action=addNews" class="btn btn-primary mb-3">Thêm Tin Tức</a>
        
        <!-- Hiển thị danh sách tin tức -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <table class="table">
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
                <?php if (empty($newsList)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Không có tin tức nào để hiển thị.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($newsList as $news): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($news['id']); ?></td>
                        <td><?php echo htmlspecialchars($news['title']); ?></td>
                        <td><?php echo htmlspecialchars($news['category_name']); ?></td>
                        <td><?php echo htmlspecialchars($news['created_at']); ?></td>
                        <td>
                            <a href="?action=editNews&id=<?php echo $news['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="?action=deleteNews&id=<?php echo $news['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?')">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
