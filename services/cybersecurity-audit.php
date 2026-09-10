<?php include __DIR__ . '/../includes/header.php'; ?>

<!-- Dynamic SEO Metadata & FAQ Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "What is the difference between a vulnerability assessment and penetration testing?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "A vulnerability assessment uses automated scanners to search for known vulnerabilities and outdated code packages. Penetration testing is a manual, simulated attack where a security engineer attempts to breach your application, testing business logic and database access."
            }
        },
        {
            "@type": "Question",
            "name": "Do I need a security audit before raising investment?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, most venture capitalists and angel investors run technical due diligence that includes reviewing your application security, data storage compliance, and system architecture before closing funding rounds."
            }
        },
        {
            "@type": "Question",
            "name": "How often should a startup get audited?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We recommend running automated vulnerability scans monthly or after every major code release, and scheduling a full penetration test annually or before major product launches."
            }
        },
        {
            "@type": "Question",
            "name": "Will security testing disrupt my live application?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "No. We coordinate testing windows and can run tests on a staging environment that mirrors your live production system, ensuring zero downtime for your active users."
            }
        },
        {
            "@type": "Question",
            "name": "Do you help fix the issues you find, or just report them?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We do both! We deliver a detailed remediation report showing how to fix issues, and our team of web developers is available to write and deploy patches."
            }
        }
    ]
}
</script>

<!-- Service Hero Section -->
<section class="service-hero">
    <!-- Background Glow Effects -->
    <div class="glow-effect" style="top: -80px; left: -80px; width: 600px; height: 600px; opacity: 0.4;"></div>
    <div class="glow-effect" style="bottom: -50px; right: -50px; width: 500px; height: 500px; background: radial-gradient(circle, rgba(6, 182, 212, 0.12) 0%, transparent 70%);"></div>

    <div class="container">
        <div class="service-hero-grid">
            <div class="reveal active">
                <div class="service-meta-badge">
                    <i class="fas fa-shield-halved"></i> Cybersecurity Audits
                </div>

                <h1 class="hero-title" style="margin-bottom: 1.5rem; font-size: 3rem; line-height: 1.2;">
                    Find the Vulnerabilities Before Someone Else Does
                </h1>

                <p class="hero-desc" style="margin-bottom: 2rem; color: var(--text-muted); font-size: 1.1rem; line-height: 1.8;">
                    A single data breach can destroy a startup. If your user database, payment systems, or API endpoints are compromised, you risk losing user trust, facing legal fines, and derailing investor due diligence. Many founders treat security as an afterthought until it is too late. At AgenticaSoft, we provide startup-friendly cybersecurity audits, automated vulnerability scanning, manual penetration testing, and compliance readiness assessments. We audit your codebases, server configurations, and API authorization structures to identify security risks and deliver a prioritized remediation roadmap. We explain findings in plain language so your team can patch systems quickly and build a secure foundation.
                </p>

                <div class="hero-actions">
                    <a href="#quote-form" class="btn btn-primary">
                        <i class="fas fa-rocket"></i> Get a Free Quote
                    </a>
                    <a href="#deliverables" class="btn btn-outline">
                        <i class="fas fa-list-check"></i> What's Included
                    </a>
                </div>

                <div class="hero-trust-badges" style="margin-top: 2.5rem;">
                    <div><i class="fas fa-check-circle" style="color: var(--success-color);"></i> Startup-Friendly Rates</div>
                    <div><i class="fas fa-check-circle" style="color: var(--primary-light);"></i> Scale-Ready Stack</div>
                    <div><i class="fas fa-check-circle" style="color: var(--accent-color);"></i> Direct Dev Team</div>
                </div>
            </div>

            <!-- "Who This Is For" Side Block -->
            <div class="glass-card reveal active" style="padding: 2.5rem; border-color: rgba(239, 68, 68, 0.15);">
                <h3 style="font-size: 1.4rem; color: #fff; margin-bottom: 1rem;">
                    <i class="fas fa-circle-exclamation" style="color: var(--danger-color); margin-right: 0.5rem;"></i>
                    Who This Is For
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Building a startup is hard. We help founders solve the exact product challenges that hold back growth.
                </p>
                <div class="pain-points-list">
                    
                <div class="pain-point-item">
                    <i class="fas fa-times-circle"></i>
                    <div class="pain-point-text">
                        <h5>Unprotected Customer Data</h5>
                        <p>You are handling user logins, payment records, or PII database tables without ever running a professional security check.</p>
                    </div>
                </div>
                <div class="pain-point-item">
                    <i class="fas fa-times-circle"></i>
                    <div class="pain-point-text">
                        <h5>SOC 2 or GDPR Compliance Needs</h5>
                        <p>You are pitching to enterprise clients or preparing for fundraising, and they are demanding a SOC 2 audit or security report.</p>
                    </div>
                </div>
                <div class="pain-point-item">
                    <i class="fas fa-times-circle"></i>
                    <div class="pain-point-text">
                        <h5>Risk of SQL Injection or XSS</h5>
                        <p>Your developers have built custom code but lack training in secure coding practices, leaving APIs open to vulnerabilities.</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Deliverables Section -->
<section id="deliverables" class="services-section" style="border-top: 1px solid var(--card-border); background: var(--dark-bg-alt);">
    <div class="container">
        <div class="header-center" style="text-align: center; margin-bottom: 3rem;">
            <h2 class="section-title">
                <span>Deliverables</span>
                What We Deliver
            </h2>
            <p class="section-subtitle" style="max-width: 700px; margin: 0 auto; color: var(--text-muted);">
                Our services are transparent and deliverable-focused. Here is exactly what is included in our code packages.
            </p>
        </div>

        <div class="service-deliverables-grid">
            
            <div class="deliverable-card">
                <div class="deliverable-icon">
                    <i class="fas fa-radar"></i>
                </div>
                <h3>Vulnerability Assessments</h3>
                <p>We perform automated scans of your servers, websites, and code repos to identify outdated packages, open ports, and configuration issues.</p>
            </div>
            <div class="deliverable-card">
                <div class="deliverable-icon">
                    <i class="fas fa-user-ninja"></i>
                </div>
                <h3>Penetration Testing</h3>
                <p>Our ethical hackers simulate real-world attacks against your app workflows, testing database validation, authorization controls, and API security.</p>
            </div>
            <div class="deliverable-card">
                <div class="deliverable-icon">
                    <i class="fas fa-file-shield"></i>
                </div>
                <h3>Compliance Readiness Review</h3>
                <p>We audit your data handling practices against SOC 2, GDPR, HIPAA, or PCI-DSS requirements, identifying compliance gaps.</p>
            </div>
            <div class="deliverable-card">
                <div class="deliverable-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3>Application Hardening Plans</h3>
                <p>We deliver prioritized remediation roadmaps containing clear code patches, server hardening guides, and secure API structures.</p>
            </div>
        </div>
    </div>
</section>

<!-- Timeline / Process Section -->
<section class="process-section" style="padding: var(--section-spacing) 0; border-top: 1px solid var(--card-border);">
    <div class="container">
        <div class="header-center" style="text-align: center; margin-bottom: 3rem;">
            <h2 class="section-title">
                <span>The Framework</span>
                Our 4-Step Process
            </h2>
            <p class="section-subtitle" style="max-width: 700px; margin: 0 auto; color: var(--text-muted);">
                We operate with transparency, speed, and continuous feedback. Here is how we build your project.
            </p>
        </div>

        <div class="process-timeline">
            
            <div class="timeline-step reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-num">Step 01</span>
                    <h4>Scope Definition</h4>
                    <p>We define the scope of the audit (IP ranges, domain endpoints, database connections, and source code access) to plan testing.</p>
                </div>
            </div>
            <div class="timeline-step reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-num">Step 02</span>
                    <h4>Scanning &amp; Penetration Sprints</h4>
                    <p>We run vulnerability scanners and manually simulate attacks to test validation rules, user permissions, and API endpoints.</p>
                </div>
            </div>
            <div class="timeline-step reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-num">Step 03</span>
                    <h4>Remediation Reporting</h4>
                    <p>We compile a security report categorizing findings by severity, with clear steps showing how to resolve each vulnerability.</p>
                </div>
            </div>
            <div class="timeline-step reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-num">Step 04</span>
                    <h4>Verification &amp; Re-Scan</h4>
                    <p>After your team implements the patches, we run a validation scan to confirm all critical security gaps are resolved.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose AgenticaSoft -->
<section class="why-section" style="padding: var(--section-spacing) 0; border-top: 1px solid var(--card-border); background: var(--dark-bg-alt);">
    <div class="container">
        <div class="header-center" style="text-align: center; margin-bottom: 3rem;">
            <h2 class="section-title">
                <span>The Difference</span>
                Why Startups Choose Us
            </h2>
            <p class="section-subtitle" style="max-width: 700px; margin: 0 auto; color: var(--text-muted);">
                We design and engineer digital systems built to accelerate your traction and help you scale.
            </p>
        </div>

        <div class="why-grid">
            
            <div class="why-card reveal" style="transition-delay: 0s;">
                <div class="why-card-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Plain-English Reports for Founders</h3>
                <p>We don't just dump scanner logs. We explain security issues, business risks, and remediation steps in clear language that founders can understand.</p>
            </div>
            <div class="why-card reveal" style="transition-delay: 0.1s;">
                <div class="why-card-icon">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <h3>Remediation Support Included</h3>
                <p>Unlike auditing firms that just list problems and leave, our developers can collaborate directly with your team to patch the code.</p>
            </div>
            <div class="why-card reveal" style="transition-delay: 0.2s;">
                <div class="why-card-icon">
                    <i class="fas fa-code-branch"></i>
                </div>
                <h3>Security Baked into Development</h3>
                <p>Because we design and build software, we understand how vulnerabilities are introduced, allowing us to spot issues that generic scanners miss.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Signal Block -->
<section class="pricing-section" style="padding: var(--section-spacing) 0; border-top: 1px solid var(--card-border);">
    <div class="container">
        <div class="glass-card pricing-signal-box reveal" style="border-radius: var(--radius-xl);">
            <div class="pricing-signal-grid">
                <div class="pricing-signal-info">
                    <h2 style="font-size: 2.2rem; color: #fff; margin-bottom: 0.5rem; font-family: var(--font-heading);">
                        Transparent Pricing Structure
                    </h2>
                    <p style="color: var(--text-muted); line-height: 1.8; font-size: 1rem;">
                        Basic automated scans and code checks start at $1,500. Comprehensive penetration testing of web applications, cloud architecture, and compliance readiness reviews range from $3,500 to $8,000.
                    </p>
                    <p style="color: var(--text-muted); line-height: 1.8; font-size: 1rem;">
                        Every project starts with a detailed sitemap, functional feature map, and developer hourly breakdown, ensuring you pay for nothing you don't need.
                    </p>
                </div>
                <div class="pricing-signal-price">
                    <span class="price-sub">Starting Range</span>
                    <div class="price-val">$1,500 - $8,000</div>
                    <p style="color: var(--text-dim); font-size: 0.85rem; margin-bottom: 1.5rem;">
                        Final quote depends on database structure, external APIs, and integrations.
                    </p>
                    <a href="#quote-form" class="btn btn-primary" style="display: inline-block; width: 100%;">
                        Request Exact Quote
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Client Review Block Placeholder -->
<section class="testimonials-section" style="padding: var(--section-spacing) 0; border-top: 1px solid var(--card-border); background: var(--dark-bg-alt);">
    <div class="container" style="text-align: center;">
        <div class="glass-card reveal" style="max-width: 800px; margin: 0 auto; padding: 3rem; border-radius: var(--radius-xl);">
            <i class="fas fa-quote-left" style="font-size: 2.5rem; color: var(--primary-light); opacity: 0.3; margin-bottom: 1.5rem; display: block;"></i>
            <p style="font-size: 1.2rem; color: #fff; font-style: italic; line-height: 1.8; margin-bottom: 1.5rem;">
                "AgenticaSoft delivered our project within three weeks and at a fraction of the cost quoted by other agencies. Their developers mapped out our architecture, set up secure databases, and launched with zero bugs. Highly recommended technical partner!"
            </p>
            <h4 style="font-size: 1.1rem; color: var(--primary-light); margin-bottom: 0.25rem;">Startup Founder</h4>
            <span style="font-size: 0.85rem; color: var(--text-dim);">Early-Stage Fintech Platform</span>
        </div>
    </div>
</section>

<!-- FAQs Section -->
<section id="faq" class="faq-section" style="padding: var(--section-spacing) 0; border-top: 1px solid var(--card-border);">
    <div class="container">
        <div class="header-center" style="text-align: center; margin-bottom: 4rem;">
            <h2 class="section-title">
                <span>FAQ</span>
                Frequently Asked Questions
            </h2>
            <p class="section-subtitle" style="max-width: 700px; margin: 0 auto; color: var(--text-muted);">
                Get answers to common queries about our Cybersecurity Audits services.
            </p>
        </div>

        <div class="faq-grid" style="max-width: 800px; margin: 0 auto; display: flex; flex-direction: column; gap: 1rem;">
            
            <div class="glass-card faq-item reveal" style="transition-delay: 0s;">
                <div class="faq-question">
                    <h4>What is the difference between a vulnerability assessment and penetration testing?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>A vulnerability assessment uses automated scanners to search for known vulnerabilities and outdated code packages. Penetration testing is a manual, simulated attack where a security engineer attempts to breach your application, testing business logic and database access.</p>
                </div>
            </div>
            <div class="glass-card faq-item reveal" style="transition-delay: 0.05s;">
                <div class="faq-question">
                    <h4>Do I need a security audit before raising investment?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, most venture capitalists and angel investors run technical due diligence that includes reviewing your application security, data storage compliance, and system architecture before closing funding rounds.</p>
                </div>
            </div>
            <div class="glass-card faq-item reveal" style="transition-delay: 0.1s;">
                <div class="faq-question">
                    <h4>How often should a startup get audited?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We recommend running automated vulnerability scans monthly or after every major code release, and scheduling a full penetration test annually or before major product launches.</p>
                </div>
            </div>
            <div class="glass-card faq-item reveal" style="transition-delay: 0.15s;">
                <div class="faq-question">
                    <h4>Will security testing disrupt my live application?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>No. We coordinate testing windows and can run tests on a staging environment that mirrors your live production system, ensuring zero downtime for your active users.</p>
                </div>
            </div>
            <div class="glass-card faq-item reveal" style="transition-delay: 0.2s;">
                <div class="faq-question">
                    <h4>Do you help fix the issues you find, or just report them?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We do both! We deliver a detailed remediation report showing how to fix issues, and our team of web developers is available to write and deploy patches.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA + Lead Form -->
<section id="quote-form" class="contact-section" style="border-top: 1px solid var(--card-border); background: linear-gradient(180deg, var(--dark-bg) 0%, rgba(59, 130, 246, 0.03) 100%); padding: var(--section-spacing) 0;">
    <div class="container contact-form-container">
        <h2 class="section-title" style="text-align: center;">
            <span>Get a Quote</span>
            Let's Build Your Project
        </h2>
        <p class="section-subtitle" style="text-align: center; max-width: 600px; margin: 0 auto 3rem auto; color: var(--text-muted);">
            Ready to scale? Fill out the form below to get a technical layout and cost breakdown within 24 hours.
        </p>

        <div class="glass-card reveal" style="max-width: 700px; margin: 0 auto; padding: 3rem; border-radius: var(--radius-xl);">
            <form action="/submission" method="POST" class="contact-form">
                <div class="contact-form-grid">
                    <div class="form-group">
                        <label for="contact-name">Name</label>
                        <input type="text" id="contact-name" name="name" required class="form-control" placeholder="Your full name">
                    </div>
                    <div class="form-group">
                        <label for="contact-email">Email</label>
                        <input type="email" id="contact-email" name="email" required class="form-control" placeholder="you@company.com">
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact-service">Service Needed</label>
                    <select id="contact-service" name="service" class="form-control">
                        <option value="Cybersecurity Audits" selected>Cybersecurity Audits</option>
                        <option value="Web Development">Web Development</option>
                        <option value="Web Design">Web Design</option>
                        <option value="UI/UX Design">UI/UX Design</option>
                        <option value="AI Chatbot Development">AI Chatbot Development</option>
                        <option value="AI Integration">AI Integration</option>
                        <option value="Workflow Automation">Workflow Automation</option>
                        <option value="SEO Optimization">SEO Optimization</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                        <option value="Cybersecurity Audit">Cybersecurity Audit</option>
                        <option value="Custom Software">Custom Software Solutions</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="contact-message">Project Description</label>
                    <textarea id="contact-message" name="message" rows="5" required class="form-control" placeholder="Tell us about your project requirements, goals, and timeline..."></textarea>
                </div>

                <button type="submit" id="submit-btn" class="btn btn-primary" style="width: 100%;">
                    <i class="fas fa-paper-plane"></i> Send Request
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Footer Quick Links / Related Services -->
<section class="related-services-section" style="padding: 4rem 0; border-top: 1px solid var(--card-border); background: var(--dark-bg-alt);">
    <div class="container" style="text-align: center;">
        <h3 style="margin-bottom: 1.5rem; font-size: 1.25rem;">Related Startup Services</h3>
        <ul style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; list-style: none;">
            <li><a href="/services/custom-software-development">Custom Software</a></li><li><a href="/services/web-development-for-startups">Web Development</a></li><li><a href="/services/ai-integration-services">AI Integration</a></li>
            <li><a href="/blog" style="color: var(--primary-light);">Our Blog</a></li>
            <li><a href="/#lead-magnet" style="color: var(--accent-color); font-weight: 500;">Lead Magnet: Tech Stack Checklist</a></li>
        </ul>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
