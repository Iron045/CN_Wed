<!-- admin/news/add.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tin Tức - Quản Trị NewsFlash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2>Thêm Tin Tức Mới</h2>
        <form action="?action=addNews" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu Đề</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội Dung</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh Mục</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="">Chọn Danh Mục</option>
                    <?php foreach ($categoryList as $category): ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm Tin Tức</button>
        </form>
        <a href="?action=news" class="btn btn-secondary mt-3">Quay lại danh sách</a>
    </div>
</body>
</html>
