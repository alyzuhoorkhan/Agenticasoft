<?php include __DIR__ . '/../includes/header.php'; ?>

<!-- Dynamic SEO Metadata & FAQ Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "Do I need UI/UX design if I already have a developer?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes. Developers are experts in coding logic, databases, and APIs, but they are rarely trained in user psychology, conversion strategy, and typography. Investing in UI/UX design before coding ensures you build the right layout the first time, preventing expensive codebase rewrites."
            }
        },
        {
            "@type": "Question",
            "name": "What is a design system and do I need one as a startup?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "A design system is a comprehensive library of reusable visual components (buttons, text styles, forms, headers) and guidelines. Yes, even early startups benefit from one. It ensures visual consistency, serves as a source of truth, and speeds up front-end coding."
            }
        },
        {
            "@type": "Question",
            "name": "How do you conduct usability testing on a small budget?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We run focused testing sessions with 5 to 7 target users. Research shows that testing with just 5 users uncovers up to 85% of core usability issues. We record their screens and feedback to identify navigation issues without high costs."
            }
        },
        {
            "@type": "Question",
            "name": "Can you redesign just one specific flow (like onboarding or checkout)?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, we handle targeted optimizations. We run a UX audit on your current user flow, look at friction points, and design a simplified, high-converting checkout or onboarding path to reduce user drop-offs."
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
                    <i class="fas fa-pen-nib"></i> UI/UX Design
                </div>

                <h1 class="hero-title" style="margin-bottom: 1.5rem; font-size: 3rem; line-height: 1.2;">
                    UI/UX Design Rooted in Real User Research
                </h1>

                <p class="hero-desc" style="margin-bottom: 2rem; color: var(--text-muted); font-size: 1.1rem; line-height: 1.8;">
                    A software application's success is determined by how easily a user can achieve their goals. If your onboarding flow is confusing, or your checkout screen is complex, your churn rates will rise, and your startup will fail. At AgenticaSoft, we provide user-centered UI/UX design services tailored to software products, SaaS systems, mobile apps, and digital platforms. We start with real user research, mapping user personas, and sketching wireframes to define clean interfaces. We build complete, interactive prototypes that allow you to validate workflows and gather feedback before writing code. This user-first approach reduces development rework, saves money, and drives higher retention rates.
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
                        <h5>High User Churn Rates</h5>
                        <p>Users are signing up for your app or SaaS, but they drop off during onboarding or fail to return because the dashboard feels complex.</p>
                    </div>
                </div>
                <div class="pain-point-item">
                    <i class="fas fa-times-circle"></i>
                    <div class="pain-point-text">
                        <h5>Development Rework Costs</h5>
                        <p>Your development team is coding features, only to find that users find the UI confusing, forcing expensive code changes after launch.</p>
                    </div>
                </div>
                <div class="pain-point-item">
                    <i class="fas fa-times-circle"></i>
                    <div class="pain-point-text">
                        <h5>Lack of a Cohesive UI</h5>
                        <p>Your product UI is a mix of different styles, buttons, and fonts because you lack a structured, cohesive design system.</p>
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
                    <i class="fas fa-users"></i>
                </div>
                <h3>User Research &amp; Personas</h3>
                <p>We interview target users, analyze behaviors, and define detailed buyer personas. This guarantees that your product workflows address real user pain points and needs.</p>
            </div>
            <div class="deliverable-card">
                <div class="deliverable-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <h3>Wireframing &amp; Prototyping</h3>
                <p>We create low-fidelity wireframes to outline structural content hierarchy, followed by interactive, clickable Figma prototypes to test flows before coding.</p>
            </div>
            <div class="deliverable-card">
                <div class="deliverable-icon">
                    <i class="fas fa-cube"></i>
                </div>
                <h3>Scalable Design Systems</h3>
                <p>We build complete UI component libraries, including consistent buttons, inputs, icons, typography, and states. This ensures branding consistency across your product.</p>
            </div>
            <div class="deliverable-card">
                <div class="deliverable-icon">
                    <i class="fas fa-vial"></i>
                </div>
                <h3>Usability Testing &amp; Audit</h3>
                <p>We conduct usability testing sessions with real users, compile video feedback, identify navigation friction points, and deliver actionable refinement steps.</p>
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
                    <h4>Discovery &amp; User Research</h4>
                    <p>We define project objectives, map user journeys, and interview target users to uncover pain points and behavior patterns.</p>
                </div>
            </div>
            <div class="timeline-step reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-num">Step 02</span>
                    <h4>UX Wireframing &amp; Flow</h4>
                    <p>We build structural wireframes to map user actions, onboarding steps, and critical app screens, ensuring smooth navigation flows.</p>
                </div>
            </div>
            <div class="timeline-step reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-num">Step 03</span>
                    <h4>UI Styling &amp; Prototyping</h4>
                    <p>We design high-fidelity screens in Figma and connect them into an interactive, clickable prototype that acts like a live software app.</p>
                </div>
            </div>
            <div class="timeline-step reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-num">Step 04</span>
                    <h4>Testing &amp; Dev Handoff</h4>
                    <p>We test the prototype with real users, iterate based on usability feedback, align the design system, and hand off assets to the dev team.</p>
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
                <h3>Research-Backed Designs</h3>
                <p>We don't design based on guesswork or visual trends. Every screen, button placement, and menu structure is guided by real user research and proven usability patterns.</p>
            </div>
            <div class="why-card reveal" style="transition-delay: 0.1s;">
                <div class="why-card-icon">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <h3>Developer Feasibility Check</h3>
                <p>Our UI/UX designers collaborate with our technical developers during the wireframing phase. This prevents design handoff gaps and avoids unbuildable layouts.</p>
            </div>
            <div class="why-card reveal" style="transition-delay: 0.2s;">
                <div class="why-card-icon">
                    <i class="fas fa-code-branch"></i>
                </div>
                <h3>Structured UI Libraries</h3>
                <p>We provide design systems that serve as a single source of truth, enabling your developers to build new features quickly while maintaining design consistency.</p>
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
                        Interactive UI/UX design scopes for custom dashboards or mobile apps typically range from $2,500 to $6,000. Full product design systems and end-to-end prototyping fall in the $5,000 to $12,000 range.
                    </p>
                    <p style="color: var(--text-muted); line-height: 1.8; font-size: 1rem;">
                        Every project starts with a detailed sitemap, functional feature map, and developer hourly breakdown, ensuring you pay for nothing you don't need.
                    </p>
                </div>
                <div class="pricing-signal-price">
                    <span class="price-sub">Starting Range</span>
                    <div class="price-val">$2,500 - $12,000</div>
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
                Get answers to common queries about our UI/UX Design services.
            </p>
        </div>

        <div class="faq-grid" style="max-width: 800px; margin: 0 auto; display: flex; flex-direction: column; gap: 1rem;">
            
            <div class="glass-card faq-item reveal" style="transition-delay: 0s;">
                <div class="faq-question">
                    <h4>Do I need UI/UX design if I already have a developer?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes. Developers are experts in coding logic, databases, and APIs, but they are rarely trained in user psychology, conversion strategy, and typography. Investing in UI/UX design before coding ensures you build the right layout the first time, preventing expensive codebase rewrites.</p>
                </div>
            </div>
            <div class="glass-card faq-item reveal" style="transition-delay: 0.05s;">
                <div class="faq-question">
                    <h4>What is a design system and do I need one as a startup?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>A design system is a comprehensive library of reusable visual components (buttons, text styles, forms, headers) and guidelines. Yes, even early startups benefit from one. It ensures visual consistency, serves as a source of truth, and speeds up front-end coding.</p>
                </div>
            </div>
            <div class="glass-card faq-item reveal" style="transition-delay: 0.1s;">
                <div class="faq-question">
                    <h4>How do you conduct usability testing on a small budget?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We run focused testing sessions with 5 to 7 target users. Research shows that testing with just 5 users uncovers up to 85% of core usability issues. We record their screens and feedback to identify navigation issues without high costs.</p>
                </div>
            </div>
            <div class="glass-card faq-item reveal" style="transition-delay: 0.15s;">
                <div class="faq-question">
                    <h4>Can you redesign just one specific flow (like onboarding or checkout)?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, we handle targeted optimizations. We run a UX audit on your current user flow, look at friction points, and design a simplified, high-converting checkout or onboarding path to reduce user drop-offs.</p>
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
                        <option value="UI/UX Design" selected>UI/UX Design</option>
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
            <li><a href="/services/web-design-for-startups">Web Design</a></li><li><a href="/services/web-development-for-startups">Web Development</a></li><li><a href="/services/custom-software-development">Custom Software</a></li>
            <li><a href="/blog" style="color: var(--primary-light);">Our Blog</a></li>
            <li><a href="/#lead-magnet" style="color: var(--accent-color); font-weight: 500;">Lead Magnet: Tech Stack Checklist</a></li>
        </ul>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
