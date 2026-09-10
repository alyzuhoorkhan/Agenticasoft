<?php include 'includes/header.php'; ?>

<section class="thankyou-section"
    style="padding: 150px 0; text-align: center; min-height: 80vh; display: flex; align-items: center; justify-content: center;">
    <div class="container">
        <div class="glass-card reveal" style="max-width: 600px; margin: 0 auto; padding: 3rem;">
            <div style="margin-bottom: 2rem;">
                <i class="fas fa-check-circle"
                    style="font-size: 5rem; color: var(--success-color); filter: drop-shadow(0 0 10px rgba(16,185,129,0.5));"></i>
            </div>

            <h1 class="section-title" style="margin-bottom: 1.5rem;">
                <span>Success!</span>
                Message Sent
            </h1>

            <p style="color: var(--text-muted); font-size: 1.2rem; margin-bottom: 2.5rem;">
                Thank you for reaching out. We have received your message and will get back to you shortly.
            </p>

            <a href="index.php" class="btn btn-primary">
                <i class="fas fa-home" style="margin-right: 8px;"></i> Return Home
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>