<?php 
include 'includes/db.php';
include 'includes/header.php'; 

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $stmt = $conn->prepare("SELECT b.*, u.username FROM blogs b LEFT JOIN users u ON b.author_id = u.id WHERE b.slug = ?");
    $stmt->bind_param("s", $slug);
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT b.*, u.username FROM blogs b LEFT JOIN users u ON b.author_id = u.id WHERE b.id = ?");
    $stmt->bind_param("i", $id);
} else {
    header("Location: blog.php");
    exit();
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<div class='container' style='padding-top: 120px; text-align:center;'><h2>Post not found</h2><a href='blog.php' class='btn btn-primary'>Back to Blog</a></div>";
    include 'includes/footer.php';
    exit();
}

$row = $result->fetch_assoc();
?>

<div class="container" style="padding-top: 120px; padding-bottom: 4rem; max-width: 900px;">
    <a href="blog" style="color: var(--text-muted); margin-bottom: 2rem; display: inline-block;"><i class="fas fa-arrow-left"></i> Back to Blog</a>
    
    <h1 style="font-size: 3rem; margin-bottom: 1.5rem; line-height: 1.2;"><?php echo htmlspecialchars($row['title']); ?></h1>
    
    <div style="display: flex; gap: 2rem; color: var(--text-muted); margin-bottom: 3rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 2rem;">
        <span><i class="far fa-user"></i> <?php echo htmlspecialchars($row['username'] ?? 'Admin'); ?></span>
        <span><i class="far fa-calendar-alt"></i> <?php echo date('F d, Y', strtotime($row['created_at'])); ?></span>
    </div>

    <?php if($row['image']): ?>
        <img src="<?php echo htmlspecialchars($row['image']); ?>" style="width: 100%; border-radius: 12px; margin-bottom: 3rem;">
    <?php endif; ?>

    <div class="content" style="font-size: 1.15rem; line-height: 1.8; color: #e5e7eb;">
        <?php echo nl2br(htmlspecialchars($row['content'])); ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
