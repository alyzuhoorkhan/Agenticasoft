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

    // ==========================================================
    // Static form handling (no PHP backend)
    // ----------------------------------------------------------
    // Submissions are delivered by FormSubmit (formsubmit.co) to the
    // address below — no account needed, but the FIRST submission
    // triggers a one-time confirmation email that must be clicked.
    // To switch providers, replace FORM_ENDPOINT with a Formspree,
    // Web3Forms, Getform or Basin URL — they all accept this JSON.
    // Leave it empty and forms fall back to the visitor's mail client.
    // ==========================================================
    const FORM_ENDPOINT = 'https://formsubmit.co/ajax/zahooralykhan@gmail.com';
    const CONTACT_EMAIL = 'zahooralykhan@gmail.com';

    // Where visitors land after a successful contact submission
    function thankYouUrl() {
        return (window.location.pathname.includes('/services/') ? '../' : '') + 'thankyou.html';
    }

    function sendLead(formData, subject) {
        if (FORM_ENDPOINT) {
            const payload = {};
            for (const [key, value] of formData.entries()) {
                if (key === '_next') continue;          // handled client-side
                payload[key] = value;
            }
            if (!payload._subject) payload._subject = subject;
            payload._template = 'table';
            payload._captcha = 'false';
            payload.page = window.location.href;

            return fetch(FORM_ENDPOINT, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify(payload)
            }).then(res => {
                if (!res.ok) throw new Error('Request failed with status ' + res.status);
                return res.json().catch(() => ({}));
            }).then(data => {
                if (data && data.success === 'false') throw new Error(data.message || 'Submission rejected');
                return { status: 'success' };
            });
        }

        // Fallback: compose an email in the visitor's mail client
        let body = '';
        for (const [key, value] of formData.entries()) {
            if (key.charAt(0) === '_') continue;
            body += key + ': ' + value + '\n';
        }
        window.location.href = 'mailto:' + CONTACT_EMAIL +
            '?subject=' + encodeURIComponent(subject) +
            '&body=' + encodeURIComponent(body);
        return Promise.resolve({ status: 'success' });
    }

    function successBlock(icon, heading, message) {
        return '<div style="text-align: center; padding: 2rem 0; animation: fadeInUp 0.4s ease;">' +
            '<i class="fas ' + icon + '" style="font-size: 3rem; color: var(--success-color); margin-bottom: 1rem;"></i>' +
            '<h4 style="font-size: 1.25rem; color: #fff;">' + heading + '</h4>' +
            '<p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 0.5rem; line-height: 1.6;">' + message + '</p>' +
            '</div>';
    }

    // ========== SEO Audit Request ==========
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

            if (seoReadyState) seoReadyState.style.display = 'none';
            if (seoDashboard) seoDashboard.style.display = 'none';
            if (seoConsole) {
                seoConsole.style.display = 'block';
                seoConsole.innerHTML = '';
            }

            const logs = [
                { text: '> INITIALIZING ENGINE...', delay: 0 },
                { text: '> QUEUEING TARGET: ' + urlInput, delay: 500 },
                { text: '> REGISTERING REPORT RECIPIENT...', delay: 1100 },
                { text: '> SCHEDULING CRAWL & META ANALYSIS...', delay: 1800 },
                { text: '> AUDIT REQUEST ACCEPTED.', delay: 2400 }
            ];
            logs.forEach((log) => {
                setTimeout(() => {
                    if (!seoConsole) return;
                    const logDiv = document.createElement('div');
                    logDiv.className = 'console-log';
                    logDiv.textContent = log.text;
                    seoConsole.appendChild(logDiv);
                    seoConsole.scrollTop = seoConsole.scrollHeight;
                }, log.delay);
            });

            sendLead(new FormData(seoForm), 'Free SEO Audit Request')
                .then(() => {
                    setTimeout(() => {
                        if (seoConsole) {
                            seoConsole.innerHTML += '<div class="console-log">&gt; REPORT WILL BE EMAILED TO ' +
                                emailInput.toUpperCase() + ' WITHIN 24 HOURS.</div>';
                        }
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = '<i class="fas fa-bolt"></i> Generate Free SEO Report';
                    }, 2800);
                })
                .catch(() => {
                    setTimeout(() => {
                        alert('Request failed. Please email ' + CONTACT_EMAIL + ' instead.');
                        if (seoReadyState) seoReadyState.style.display = 'flex';
                        if (seoConsole) seoConsole.style.display = 'none';
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = '<i class="fas fa-bolt"></i> Generate Free SEO Report';
                    }, 2800);
                });
        });
    }

    // ========== Website Review Request ==========
    const reviewForm = document.getElementById('website-review-form');
    if (reviewForm) {
        reviewForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const submitBtn = reviewForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting Request...';

            sendLead(new FormData(reviewForm), 'Free Website Review Request')
                .then(() => {
                    reviewForm.innerHTML = successBlock('fa-check-circle', 'Review Request Queued!',
                        'Thanks! Our team will review your website and get back to you within 2 business days.');
                })
                .catch(() => {
                    alert('Connection error. Please email ' + CONTACT_EMAIL + ' instead.');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                });
        });
    }

    // ========== Tech Stack Checklist Download ==========
    const checklistForm = document.getElementById('tech-checklist-form');
    if (checklistForm) {
        const CHECKLIST_URL = 'uploads/startup-tech-stack-checklist.pdf';
        checklistForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const submitBtn = checklistForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

            const finish = () => {
                const link = document.createElement('a');
                link.href = CHECKLIST_URL;
                link.download = 'startup-tech-stack-checklist.pdf';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                checklistForm.innerHTML = successBlock('fa-file-download', 'Download Started!',
                    'Your PDF download has initiated. If it did not start, ' +
                    '<a href="' + CHECKLIST_URL + '" download style="color: var(--accent-color); text-decoration: underline;">click here to download manually</a>.');
            };

            sendLead(new FormData(checklistForm), 'Startup Tech Stack Checklist Download')
                .then(finish)
                .catch(finish);
        });
    }

    // ========== Contact Forms ==========
    const contactForms = document.querySelectorAll('.contact-form');
    contactForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (form.getAttribute('data-submitting') === 'true') return;
            form.setAttribute('data-submitting', 'true');

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';

            sendLead(new FormData(form), 'New Enquiry from AgenticaSoft Website')
                .then(() => {
                    if (FORM_ENDPOINT) window.location.href = thankYouUrl();
                })
                .catch(() => {
                    alert('An unexpected error occurred. Please email ' + CONTACT_EMAIL + ' instead.');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                    form.removeAttribute('data-submitting');
                });
        });
    });

});
