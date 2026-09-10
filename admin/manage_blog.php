<?php
require 'auth_check.php';
include '../includes/db.php';

$title = '';
$content = '';
$image = '';
$id = '';
$is_edit = false;

if (isset($_GET['id'])) {
    $is_edit = true;
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $content = $row['content'];
        $image = $row['image'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    // Image Upload
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../uploads/";
        if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
        
        $image_name = time() . '_' . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image = "uploads/" . $image_name;
    }

    // Generate Slug
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    
    // Uniqueness Check
    $slug_check_query = "SELECT id FROM blogs WHERE slug = ? AND id != ?";
    $stmt_check = $conn->prepare($slug_check_query);
    $check_id = $is_edit ? $id : 0;
    $stmt_check->bind_param("si", $slug, $check_id);
    $stmt_check->execute();
    if ($stmt_check->get_result()->num_rows > 0) {
        $slug .= '-' . time();
    }

    if ($is_edit) {
        if ($image) {
            $stmt = $conn->prepare("UPDATE blogs SET title=?, content=?, image=?, slug=? WHERE id=?");
            $stmt->bind_param("ssssi", $title, $content, $image, $slug, $id);
        } else {
            $stmt = $conn->prepare("UPDATE blogs SET title=?, content=?, slug=? WHERE id=?");
            $stmt->bind_param("sssi", $title, $content, $slug, $id);
        }
    } else {
        $author_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("INSERT INTO blogs (title, content, image, author_id, slug) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $title, $content, $image, $author_id, $slug);
    }
    
    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Error saving blog.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $is_edit ? 'Edit' : 'New'; ?> Post - Agentica Soft</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #0b0f19; color: #e5e7eb; font-family: 'Inter', sans-serif; margin: 0; display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: #111827; border-right: 1px solid #1f2937; padding: 2rem 1rem; flex-shrink: 0; }
        .nav-link { display: block; padding: 0.8rem 1rem; color: #9ca3af; border-radius: 6px; margin-bottom: 0.5rem; text-decoration: none; }
        .nav-link:hover { background: #1f2937; color: #fff; }
        .main-content { flex-grow: 1; padding: 2rem; }
        .container { max-width: 800px; margin: 0 auto; }
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 500; }
        input[type="text"], textarea { width: 100%; padding: 0.8rem; background: #1f2937; border: 1px solid #374151; border-radius: 6px; color: #fff; outline: none; box-sizing: border-box; }
        input[type="file"] { color: #9ca3af; }
        textarea { height: 300px; resize: vertical; font-family: inherit; }
        .btn { padding: 0.8rem 2rem; border-radius: 6px; cursor: pointer; border: none; font-weight: 600; }
        .btn-primary { background: #3b82f6; color: white; }
        .btn-secondary { background: #374151; color: white; text-decoration: none; display: inline-block; text-align: center; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 style="color:#fff; padding-left:1rem;">Agentica Soft Admin</h2>
        <a href="dashboard.php" class="nav-link"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>

    <div class="main-content">
        <div class="container">
            <h1><?php echo $is_edit ? 'Edit' : 'Create New'; ?> Post</h1>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" required><?php echo htmlspecialchars($content); ?></textarea>
                </div>

                <div class="form-group">
                    <label>Featured Image</label>
                    <?php if($image): ?>
                        <div style="margin-bottom: 10px;">
                            <img src="../<?php echo $image; ?>" style="max-width: 200px; border-radius: 6px;">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="image" accept="image/*">
                </div>

                <div style="display: flex; gap: 1rem;">
                    <button type="submit" class="btn btn-primary">Save Post</button>
                    <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
