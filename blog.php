<?php 
include 'includes/db.php';
include 'includes/header.php'; 

// Fetch Blogs
$result = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC");
?>

<div class="container" style="padding-top: 120px; padding-bottom: 4rem;">
    <div class="header-center">
        <h2 class="section-title">
            <span>Insights & Updates</span>
            Latest from Agentica Soft
        </h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2.5rem; margin-top: 3rem;">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="glass-card reveal">
                <?php if($row['image']): ?>
                    <div style="height: 200px; overflow: hidden; border-radius: 8px; margin-bottom: 1.5rem;">
                        <img src="<?php echo htmlspecialchars($row['image']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                <?php endif; ?>
                
                <h3 style="margin-bottom: 1rem;"><a href="post?slug=<?php echo htmlspecialchars($row['slug']); ?>" style="color: #fff; text-decoration: none;"><?php echo htmlspecialchars($row['title']); ?></a></h3>
                
                <p style="color: var(--text-muted); margin-bottom: 1.5rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                    <?php echo strip_tags(htmlspecialchars_decode($row['content'])); ?>
                </p>

                <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid rgba(255,255,255,0.05); padding-top: 1rem;">
                    <span style="font-size: 0.9rem; color: var(--text-muted);"><i class="far fa-calendar-alt"></i> <?php echo date('M d, Y', strtotime($row['created_at'])); ?></span>
                    <a href="post?slug=<?php echo htmlspecialchars($row['slug']); ?>" style="color: var(--primary-color); font-weight: 500;">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        <?php endwhile; ?>

        <?php if($result->num_rows == 0): ?>
            <div style="grid-column: 1/-1; text-align: center; padding: 4rem; color: var(--text-muted);">
                <h3>No posts yet. check back soon!</h3>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
