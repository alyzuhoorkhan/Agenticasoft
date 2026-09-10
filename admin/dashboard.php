<?php
require 'auth_check.php';
include '../includes/db.php';

// Delete Logic
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM blogs WHERE id = $id");
    header("Location: dashboard.php");
    exit();
}

// Fetch Blogs
$result = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Agentica Soft</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #0b0f19; color: #e5e7eb; font-family: 'Inter', sans-serif; margin: 0; }
        a { text-decoration: none; color: inherit; }
        .admin-container { display: flex; min-height: 100vh; }
        
        /* Sidebar */
        .sidebar { width: 250px; background: #111827; border-right: 1px solid #1f2937; padding: 2rem 1rem; flex-shrink: 0; }
        .sidebar h2 { color: #fff; margin-bottom: 2rem; padding-left: 1rem; font-size: 1.5rem; }
        .nav-link { display: block; padding: 0.8rem 1rem; color: #9ca3af; border-radius: 6px; margin-bottom: 0.5rem; transition: 0.2s; }
        .nav-link:hover, .nav-link.active { background: #1f2937; color: #fff; }
        .nav-link i { margin-right: 10px; width: 20px; text-align: center; }

        /* Main Content */
        .main-content { flex-grow: 1; padding: 2rem; overflow-y: auto; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .btn { padding: 0.6rem 1.2rem; border-radius: 6px; font-weight: 500; cursor: pointer; border: none; }
        .btn-primary { background: #3b82f6; color: white; }
        .btn-danger { background: #ef4444; color: white; }
        
        /* Table */
        .card { background: #1f2937; border-radius: 8px; border: 1px solid #374151; overflow: hidden; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 1rem; border-bottom: 1px solid #374151; }
        th { background: #111827; font-weight: 600; color: #d1d5db; }
        tr:last-child td { border-bottom: none; }
        tr:hover { background: #2d3748; }
        .action-link { margin-right: 10px; color: #60a5fa; }
        .action-link:hover { text-decoration: underline; }
        .delete-link { color: #f87171; }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="sidebar">
            <h2>Agentica Soft Admin</h2>
            <a href="dashboard.php" class="nav-link active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="users.php" class="nav-link"><i class="fas fa-users"></i> Users</a>
            <a href="../index.php" class="nav-link" target="_blank"><i class="fas fa-external-link-alt"></i> Visit Site</a>
            <a href="logout.php" class="nav-link" style="margin-top: auto;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>

        <div class="main-content">
            <div class="header">
                <h1>Blog Posts</h1>
                <a href="manage_blog.php" class="btn btn-primary"><i class="fas fa-plus"></i> New Post</a>
            </div>

            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                            <td>
                                <a href="manage_blog.php?id=<?php echo $row['id']; ?>" class="action-link"><i class="fas fa-edit"></i> Edit</a>
                                <a href="dashboard.php?delete=<?php echo $row['id']; ?>" class="action-link delete-link" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php if($result->num_rows == 0): ?>
                        <tr><td colspan="3" style="text-align:center; color: #9ca3af;">No blog posts found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
