<!-- views/admin/news/edit.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1>Sửa Tin Tức</h1>

        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <!-- Kiểm tra xem có dữ liệu tin tức không -->
        <?php if ($news): ?>
            <form action="index.php?action=editNews&id=<?php echo $news['id']; ?>" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($news['title']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required><?php echo htmlspecialchars($news['content']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <?php foreach ($categoryList as $category): ?>
                            <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $news['category_id']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        <?php else: ?>
            <div class="alert alert-warning">Không tìm thấy tin tức cần sửa.</div>
        <?php endif; ?>
    </div>
</body>
</html>
