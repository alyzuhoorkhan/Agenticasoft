// Renders the blog index from data/posts.json
document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById('blog-grid');
    if (!grid) return;

    const empty = (msg) =>
        '<div style="grid-column: 1/-1; text-align: center; padding: 4rem; color: var(--text-muted);"><h3>' + msg + '</h3></div>';

    const esc = (s) => String(s == null ? '' : s)
        .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;').replace(/'/g, '&#39;');

    const fmtDate = (value) => {
        const d = new Date(value);
        if (isNaN(d)) return '';
        return d.toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' });
    };

    fetch('data/posts.json')
        .then(res => res.json())
        .then(posts => {
            if (!Array.isArray(posts) || posts.length === 0) {
                grid.innerHTML = empty('No posts yet. Check back soon!');
                return;
            }

            posts.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

            grid.innerHTML = posts.map(post => {
                const excerpt = (post.excerpt || post.content || '').replace(/<[^>]*>/g, '').slice(0, 280);
                const url = 'post.html?slug=' + encodeURIComponent(post.slug);
                const image = post.image
                    ? '<div style="height: 200px; overflow: hidden; border-radius: 8px; margin-bottom: 1.5rem;">' +
                      '<img src="' + esc(post.image) + '" alt="' + esc(post.title) + '" style="width: 100%; height: 100%; object-fit: cover;"></div>'
                    : '';
                return '<div class="glass-card reveal active">' + image +
                    '<h3 style="margin-bottom: 1rem;"><a href="' + url + '" style="color: #fff; text-decoration: none;">' + esc(post.title) + '</a></h3>' +
                    '<p style="color: var(--text-muted); margin-bottom: 1.5rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">' + esc(excerpt) + '</p>' +
                    '<div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid rgba(255,255,255,0.05); padding-top: 1rem;">' +
                    '<span style="font-size: 0.9rem; color: var(--text-muted);"><i class="far fa-calendar-alt"></i> ' + esc(fmtDate(post.created_at)) + '</span>' +
                    '<a href="' + url + '" style="color: var(--primary-color); font-weight: 500;">Read More <i class="fas fa-arrow-right"></i></a>' +
                    '</div></div>';
            }).join('');
        })
        .catch(() => {
            grid.innerHTML = empty('No posts yet. Check back soon!');
        });
});
