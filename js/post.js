// Renders a single post from data/posts.json using ?slug= or ?id=
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('post-container');
    if (!container) return;

    const params = new URLSearchParams(window.location.search);
    const slug = params.get('slug');
    const id = params.get('id');

    const esc = (s) => String(s == null ? '' : s)
        .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;').replace(/'/g, '&#39;');

    const notFound = () => {
        container.innerHTML = '<div style="text-align:center; padding: 3rem 0;">' +
            '<h2>Post not found</h2>' +
            '<a href="blog.html" class="btn btn-primary" style="margin-top: 1.5rem;">Back to Blog</a></div>';
    };

    if (!slug && !id) { window.location.replace('blog.html'); return; }

    fetch('data/posts.json')
        .then(res => res.json())
        .then(posts => {
            const post = (posts || []).find(p =>
                (slug && p.slug === slug) || (id && String(p.id) === String(id)));
            if (!post) { notFound(); return; }

            document.title = post.title + ' | AgenticaSoft';
            const metaDesc = document.querySelector('meta[name="description"]');
            if (metaDesc) {
                metaDesc.setAttribute('content',
                    (post.excerpt || post.content || '').replace(/<[^>]*>/g, '').slice(0, 155));
            }

            const d = new Date(post.created_at);
            const date = isNaN(d) ? '' : d.toLocaleDateString('en-US', { month: 'long', day: '2-digit', year: 'numeric' });
            const image = post.image
                ? '<img src="' + esc(post.image) + '" alt="' + esc(post.title) + '" style="width: 100%; border-radius: 12px; margin-bottom: 3rem;">'
                : '';
            // content may contain trusted HTML authored by the site owner
            const content = post.content_html || esc(post.content || '').replace(/\n/g, '<br>');

            container.innerHTML =
                '<h1 style="font-size: 3rem; margin-bottom: 1.5rem; line-height: 1.2;">' + esc(post.title) + '</h1>' +
                '<div style="display: flex; gap: 2rem; color: var(--text-muted); margin-bottom: 3rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 2rem;">' +
                '<span><i class="far fa-user"></i> ' + esc(post.author || 'Admin') + '</span>' +
                '<span><i class="far fa-calendar-alt"></i> ' + esc(date) + '</span></div>' +
                image +
                '<div class="content" style="font-size: 1.15rem; line-height: 1.8; color: #e5e7eb;">' + content + '</div>';
        })
        .catch(notFound);
});
