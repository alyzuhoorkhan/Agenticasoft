<?php include 'includes/header.php'; ?>

<section class="error-section"
    style="padding: 150px 0; text-align: center; min-height: 80vh; display: flex; align-items: center; justify-content: center;">
    <div class="container">
        <div class="glass-card reveal"
            style="max-width: 600px; margin: 0 auto; padding: 3rem; border: 1px solid rgba(239, 68, 68, 0.3);">
            <div style="margin-bottom: 2rem;">
                <i class="fas fa-exclamation-triangle"
                    style="font-size: 5rem; color: #ef4444; filter: drop-shadow(0 0 10px rgba(239, 68, 68, 0.5));"></i>
            </div>

            <h1 class="section-title" style="margin-bottom: 1.5rem;">
                <span>Error 404</span>
                Submission Failed
            </h1>

            <p style="color: var(--text-muted); font-size: 1.2rem; margin-bottom: 2.5rem;">
                Something went wrong while sending your message. Please try again or contact us directly if the problem
                persists.
            </p>

            <div class="btn-group" style="display: flex; gap: 1rem; justify-content: center;">
                <a href="/" class="btn btn-primary">
                    <i class="fas fa-home" style="margin-right: 8px;"></i> Return Home
                </a>
                <a href="/#contact" class="btn" style="border: 1px solid var(--text-muted);">
                    Try Again
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>