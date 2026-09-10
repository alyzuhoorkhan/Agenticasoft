document.addEventListener('DOMContentLoaded', () => {

    // ========== Reveal Animations (Intersection Observer) ==========
    const revealElements = document.querySelectorAll('.reveal');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: "0px 0px -40px 0px"
    });

    revealElements.forEach(element => {
        revealObserver.observe(element);
    });

    // ========== Animated Number Counters ==========
    const statNumbers = document.querySelectorAll('.stat-number[data-target]');

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.getAttribute('data-target'));
                const suffix = el.getAttribute('data-suffix') || '';
                const duration = 2000;
                const start = performance.now();

                function animate(currentTime) {
                    const elapsed = currentTime - start;
                    const progress = Math.min(elapsed / duration, 1);

                    // Ease out cubic
                    const eased = 1 - Math.pow(1 - progress, 3);
                    const current = Math.floor(eased * target);

                    el.textContent = current + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    } else {
                        el.textContent = target + suffix;
                    }
                }

                requestAnimationFrame(animate);
                counterObserver.unobserve(el);
            }
        });
    }, {
        threshold: 0.1
    });

    statNumbers.forEach(el => {
        counterObserver.observe(el);
    });

    // ========== Mobile Menu Toggle ==========
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    const links = document.querySelectorAll('.nav-links a');

    // Inject backdrop element
    const backdrop = document.createElement('div');
    backdrop.className = 'nav-backdrop';
    document.body.appendChild(backdrop);

    function openNav() {
        navLinks.classList.add('nav-active');
        backdrop.classList.add('active');
        document.body.style.overflow = 'hidden';
        if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true');
    }

    function closeNav() {
        navLinks.classList.remove('nav-active');
        backdrop.classList.remove('active');
        document.body.style.overflow = '';
        if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
    }

    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            if (navLinks.classList.contains('nav-active')) {
                closeNav();
            } else {
                openNav();
            }
        });
    }

    backdrop.addEventListener('click', closeNav);

    // Close menu when clicking a nav link
    links.forEach(link => {
        link.addEventListener('click', () => {
            closeNav();
        });
    });

    // ========== Active Nav Link Highlight ==========
    const currentPath = window.location.pathname;
    const navLinkEls = document.querySelectorAll('.nav-links > li > a.nav-link');

    // Mark active link based on current URL path
    function setActiveNavLink() {
        // Service page detection
        if (currentPath.startsWith('/services/')) {
            navLinkEls.forEach(link => {
                const href = link.getAttribute('href');
                if (href === '/#services' || href === '#services') {
                    link.classList.add('active');
                }
            });
            return;
        }

        // Blog page detection
        if (currentPath.startsWith('/blog') || currentPath.startsWith('/post')) {
            navLinkEls.forEach(link => {
                if (link.getAttribute('href') === '/blog') {
                    link.classList.add('active');
                }
            });
            return;
        }

        // Home page — use scroll position
        const sections = document.querySelectorAll('section[id]');

        function highlightNav() {
            const scrollPos = window.scrollY + 150;

            sections.forEach(section => {
                const top = section.offsetTop;
                const height = section.offsetHeight;
                const id = section.getAttribute('id');

                if (scrollPos >= top && scrollPos < top + height) {
                    navLinkEls.forEach(link => {
                        link.classList.remove('active');
                        const href = link.getAttribute('href');
                        if (href === './#' + id || href === '#' + id || href === '/#' + id) {
                            link.classList.add('active');
                        }
                    });
                }
            });
        }

        window.addEventListener('scroll', highlightNav, { passive: true });
        highlightNav();
    }

    setActiveNavLink();

    // ========== Navbar Scroll Effect ==========
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }, { passive: true });


    // ========== FAQ Accordion ==========
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        item.addEventListener('click', () => {
            // Close other open items
            faqItems.forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('faq-active')) {
                    otherItem.classList.remove('faq-active');
                    otherItem.querySelector('.faq-answer').style.maxHeight = null;
                }
            });

            // Toggle current item
            item.classList.toggle('faq-active');
            const answer = item.querySelector('.faq-answer');

            if (item.classList.contains('faq-active')) {
                answer.style.maxHeight = answer.scrollHeight + "px";
            } else {
                answer.style.maxHeight = null;
            }
        });
    });

    // ========== Smooth Parallax on Glow Effects ==========
    const glowEffects = document.querySelectorAll('.hero-section .glow-effect');

    if (glowEffects.length > 0 && window.innerWidth > 768) {
        window.addEventListener('mousemove', (e) => {
            const moveX = (e.clientX / window.innerWidth - 0.5) * 20;
            const moveY = (e.clientY / window.innerHeight - 0.5) * 20;

            glowEffects.forEach((glow, i) => {
                const factor = (i + 1) * 0.5;
                glow.style.transform = `translate(${moveX * factor}px, ${moveY * factor}px)`;
            });
        }, { passive: true });
    }

    // ========== Lead Magnet Tabs Switching ==========
    const tabBtns = document.querySelectorAll('.lead-tab-btn');
    const tabContents = document.querySelectorAll('.lead-tab-content');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetTab = btn.getAttribute('data-tab');

            tabBtns.forEach(b => b.classList.remove('active'));
            tabContents.forEach(c => c.classList.remove('active'));

            btn.classList.add('active');
            const activeContent = document.getElementById(targetTab);
            if (activeContent) {
                activeContent.classList.add('active');
            }
        });
    });

    // ========== SEO Audit Form Handling ==========
    const seoForm = document.getElementById('seo-audit-form');
    const seoReadyState = document.getElementById('seo-ready-state');
    const seoConsole = document.getElementById('seo-terminal-console');
    const seoDashboard = document.getElementById('seo-results-dashboard');

    if (seoForm) {
        seoForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const submitBtn = seoForm.querySelector('button[type="submit"]');
            const urlInput = document.getElementById('seo-url').value.trim();
            const emailInput = document.getElementById('seo-email').value.trim();

            if (!urlInput || !emailInput) return;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Preparing Audit...';

            seoReadyState.style.display = 'none';
            seoDashboard.style.display = 'none';
            seoConsole.style.display = 'block';
            seoConsole.innerHTML = '';

            const logs = [
                { text: '> INITIALIZING ENGINE...', delay: 0 },
                { text: '> RESOLVING HOST DNS: ' + urlInput, delay: 500 },
                { text: '> SCANNING SSL HANDSHAKE PROTOCOLS...', delay: 1100 },
                { text: '> FETCHING LANDING PAGE DOM NODES...', delay: 1800 },
                { text: '> AUDITING META TITLES & KEYWORDS...', delay: 2400 },
                { text: '> PARSING HEADING <h1> TO <h6> HIERARCHY...', delay: 3000 },
                { text: '> SCANNING alt ATTRIBUTES FOR IMAGE TAGS...', delay: 3600 },
                { text: '> COMPILING FINAL SCORE & ACTIONABLE REPORTS...', delay: 4200 }
            ];

            logs.forEach((log) => {
                setTimeout(() => {
                    const logDiv = document.createElement('div');
                    logDiv.className = 'console-log';
                    logDiv.textContent = log.text;
                    seoConsole.appendChild(logDiv);
                    seoConsole.scrollTop = seoConsole.scrollHeight;
                }, log.delay);
            });

            const formData = new FormData(seoForm);
            fetch('seo_audit.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                setTimeout(() => {
                    if (data.status === 'success') {
                        seoConsole.style.display = 'none';
                        seoDashboard.style.display = 'flex';

                        const circle = seoDashboard.querySelector('.score-progress-circle');
                        const numberVal = seoDashboard.querySelector('.score-number-val');
                        const domainText = document.getElementById('audit-target-domain');
                        const passedCount = document.getElementById('passed-checks-count');
                        const warningCount = document.getElementById('warning-checks-count');
                        const checklistList = document.getElementById('audit-checklist-list');
                        const recList = document.getElementById('audit-recommendations-list');

                        domainText.textContent = data.url.replace(/https?:\/\/(www\.)?/, '');
                        numberVal.textContent = data.score;

                        const offset = 251.3 - (data.score / 100) * 251.3;
                        circle.style.strokeDashoffset = offset;
                        
                        if (data.score >= 80) {
                            circle.style.stroke = 'var(--success-color)';
                        } else if (data.score >= 60) {
                            circle.style.stroke = 'var(--accent-warm)';
                        } else {
                            circle.style.stroke = 'var(--danger-color)';
                        }

                        let passed = 0;
                        let warnings = 0;

                        checklistList.innerHTML = '';
                        data.checks.forEach(check => {
                            if (check.status === 'pass') passed++;
                            else warnings++;

                            const item = document.createElement('li');
                            item.className = `audit-item ${check.status}`;
                            item.innerHTML = `
                                <div class="audit-item-header">
                                    <span>${check.title}</span>
                                    <span>${check.score}/${check.max} pts</span>
                                </div>
                                <div class="audit-item-body">${check.message}</div>
                            `;
                            checklistList.appendChild(item);
                        });

                        passedCount.textContent = passed;
                        warningCount.textContent = warnings;

                        recList.innerHTML = '';
                        data.recommendations.forEach(rec => {
                            const li = document.createElement('li');
                            li.textContent = rec;
                            recList.appendChild(li);
                        });

                    } else {
                        alert(data.message || 'An error occurred during SEO audit.');
                        resetSeoFormState();
                    }
                }, 4800);
            })
            .catch(err => {
                console.error(err);
                setTimeout(() => {
                    alert('Audit request failed. Please check your internet connection and try again.');
                    resetSeoFormState();
                }, 4800);
            })
            .finally(() => {
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="fas fa-bolt"></i> Generate Free SEO Report';
                }, 4800);
            });
        });
    }

    function resetSeoFormState() {
        seoReadyState.style.display = 'flex';
        seoConsole.style.display = 'none';
        seoDashboard.style.display = 'none';
    }

    // ========== Website Review & Tech Checklist Form Handling ==========
    const reviewForm = document.getElementById('website-review-form');
    const checklistForm = document.getElementById('tech-checklist-form');

    if (reviewForm) {
        reviewForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const submitBtn = reviewForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting Request...';

            const formData = new FormData(reviewForm);
            fetch('lead_submission.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    reviewForm.innerHTML = `
                        <div class="review-success-msg" style="text-align: center; padding: 2rem 0; animation: fadeInUp 0.4s ease;">
                            <i class="fas fa-check-circle" style="font-size: 3rem; color: var(--success-color); margin-bottom: 1rem;"></i>
                            <h4 style="font-size: 1.25rem; color: #fff;">Review Request Queued!</h4>
                            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 0.5rem; line-height: 1.6;">
                                ${data.message}
                            </p>
                        </div>
                    `;
                } else {
                    alert(data.message || 'An error occurred. Please try again.');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            })
            .catch(err => {
                console.error(err);
                alert('Connection error. Please try again.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
        });
    }

    if (checklistForm) {
        checklistForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const submitBtn = checklistForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

            const formData = new FormData(checklistForm);
            fetch('lead_submission.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const link = document.createElement('a');
                    link.href = data.download_url;
                    link.download = 'startup-tech-stack-checklist.pdf';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    checklistForm.innerHTML = `
                        <div class="checklist-success-msg" style="text-align: center; padding: 2rem 0; animation: fadeInUp 0.4s ease;">
                            <i class="fas fa-file-download" style="font-size: 3rem; color: var(--success-color); margin-bottom: 1rem;"></i>
                            <h4 style="font-size: 1.25rem; color: #fff;">Download Started!</h4>
                            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 0.5rem; line-height: 1.6;">
                                Your PDF download has initiated. Check your downloads folder! If the download didn't start, <a href="${data.download_url}" download style="color: var(--accent-color); text-decoration: underline;">click here to download manually</a>.
                            </p>
                        </div>
                    `;
                } else {
                    alert(data.message || 'An error occurred. Please try again.');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            })
            .catch(err => {
                console.error(err);
                alert('Connection error. Please try again.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
        });
    }

    // ========== Contact Form Global AJAX Handling ==========
    const contactForms = document.querySelectorAll('.contact-form');
    contactForms.forEach(form => {
        // If this is index.php, let the inline script handle it, or handle it here if not bound yet
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            // Check if already handled to prevent double submits
            if (form.getAttribute('data-submitting') === 'true') return;
            form.setAttribute('data-submitting', 'true');

            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';

            let action = form.getAttribute('action');
            if (action && !action.startsWith('/') && !action.startsWith('http')) {
                action = '/' + action;
            }

            fetch(action || '/submission', {
                method: 'POST',
                body: formData
            })
            .then(res => res.text())
            .then(text => {
                try {
                     return JSON.parse(text);
                } catch (e) {
                     console.error('Server returned non-JSON:', text);
                     throw new Error('Server response was not valid JSON');
                }
            })
            .then(response => {
                if (response.status === 'success') {
                    window.location.href = '/thankyou.php';
                } else {
                    console.error('Submission error:', response.message);
                    window.location.href = '/404.php';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An unexpected error occurred. Please try again later.');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
                form.removeAttribute('data-submitting');
            });
        });
    });

});
