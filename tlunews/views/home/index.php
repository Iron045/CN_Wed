<!-- views/home/index.php -->
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
        <h1>Trang Chủ</h1>

        <!-- Form Tìm kiếm -->
        <form action="index.php?action=search" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm tin tức..." />
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Hiển thị thông báo lỗi nếu không tìm thấy kết quả -->
        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-warning"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <!-- Hiển thị danh sách tin tức -->
        <div class="row">
            <?php if (!empty($newsList)): ?>
                <?php foreach ($newsList as $news): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <!-- Giả sử bạn có đường dẫn đến ảnh -->
                            <img src="path_to_image" class="card-img-top" alt="Tin tức">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($news['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($news['content']); ?></p>
                                <a href="index.php?action=detail&id=<?php echo $news['id']; ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có tin tức nào để hiển thị.</p>
            <?php endif; ?>
        </div>

        <!-- Hiển thị danh mục -->
        <h2>Danh Mục</h2>
        <ul>
            <?php if (!empty($categoryList)): ?>
                <?php foreach ($categoryList as $category): ?>
                    <li><a href="index.php?action=filter&categoryId=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có danh mục nào.</p>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
