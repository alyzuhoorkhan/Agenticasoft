<?php
require 'auth_check.php';
include '../includes/db.php';

// Add User Logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    header("Location: users.php");
    exit();
}

// Delete Logic
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // Prevent deleting self if only one user, but simpler to just prevent deleting current session user
    if ($id != $_SESSION['user_id']) {
        $conn->query("DELETE FROM users WHERE id = $id");
    }
    header("Location: users.php");
    exit();
}

// Fetch Users
$result = $conn->query("SELECT * FROM users ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users - Agentica Soft</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #0b0f19; color: #e5e7eb; font-family: 'Inter', sans-serif; margin: 0; display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: #111827; border-right: 1px solid #1f2937; padding: 2rem 1rem; flex-shrink: 0; }
        .nav-link { display: block; padding: 0.8rem 1rem; color: #9ca3af; border-radius: 6px; margin-bottom: 0.5rem; text-decoration: none; }
        .nav-link:hover { background: #1f2937; color: #fff; }
        .main-content { flex-grow: 1; padding: 2rem; }
        .container { max-width: 800px; margin: 0 auto; }
        
        .card { background: #1f2937; border-radius: 8px; border: 1px solid #374151; padding: 1.5rem; margin-bottom: 2rem; }
        .form-group { margin-bottom: 1rem; }
        input { width: 100%; padding: 0.8rem; background: #111827; border: 1px solid #374151; border-radius: 6px; color: #fff; box-sizing: border-box; }
        .btn { padding: 0.8rem 1.5rem; background: #3b82f6; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; }
        
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 1rem; border-bottom: 1px solid #374151; }
        th { color: #9ca3af; font-weight: 500; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 style="color:#fff; padding-left:1rem;">Agentica Soft Admin</h2>
        <a href="dashboard.php" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="users.php" class="nav-link" style="color:#fff; background: #1f2937;"><i class="fas fa-users"></i> Users</a>
        <a href="../index.php" class="nav-link" target="_blank"><i class="fas fa-external-link-alt"></i> Visit Site</a>
    </div>

    <div class="main-content">
        <div class="container">
            <h1>Manage Users</h1>

            <div class="card">
                <h3>Add New Admin</h3>
                <form method="POST" style="margin-top: 1rem; display: flex; gap: 1rem; align-items: flex-end;">
                    <div style="flex-grow: 1;">
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div style="flex-grow: 1;">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="add_user" class="btn">Add User</button>
                </form>
            </div>

            <div class="card" style="padding: 0;">
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($row['username']); ?>
                                <?php if($row['id'] == $_SESSION['user_id']) echo " (You)"; ?>
                            </td>
                            <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                            <td>
                                <?php if($row['id'] != $_SESSION['user_id']): ?>
                                <a href="users.php?delete=<?php echo $row['id']; ?>" style="color: #ef4444;" onclick="return confirm('Delete this user?')">Remove</a>
                                <?php else: ?>
                                <span style="color: #6b7280;">Current</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
