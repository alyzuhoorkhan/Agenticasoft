<?php include __DIR__ . '/../includes/header.php'; ?>

<!-- Dynamic SEO Metadata & FAQ Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "What's the difference between AI integration and a custom chatbot?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "An AI chatbot is a customer-facing conversational interface built for support. AI integration is a broader backend service where we embed intelligent algorithms (like data categorizers, translation engines, or image analyzers) into your software."
            }
        },
        {
            "@type": "Question",
            "name": "Do I need my own database of data to use AI or ML?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Not necessarily. If we are integrating OpenAI or Claude for content generation, OCR, or translations, we utilize their pre-trained models. However, to build predictive analysis, search systems, or recommendations, we need access to your business data."
            }
        },
        {
            "@type": "Question",
            "name": "What does \"predictive analytics\" actually mean for a small business?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "It means using algorithms to analyze patterns in your historical customer data to forecast future outcomes. For example, predicting which users are likely to cancel their subscriptions next month, or forecasting next quarter's inventory needs."
            }
        },
        {
            "@type": "Question",
            "name": "Is AI integration expensive\u2014can a bootstrapped startup afford it?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, by utilizing existing public APIs and open-source models, we keep development costs low. We build modularly, allowing you to launch an initial AI feature for a small budget and scale it as your user base grows."
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
                    <i class="fas fa-microchip"></i> AI Integration Services
                </div>

                <h1 class="hero-title" style="margin-bottom: 1.5rem; font-size: 3rem; line-height: 1.2;">
                    Add AI to What You Already Have — No Rebuild Required
                </h1>

                <p class="hero-desc" style="margin-bottom: 2rem; color: var(--text-muted); font-size: 1.1rem; line-height: 1.8;">
                    Artificial intelligence is changing the business world, but you don't need to build a custom AI platform from scratch to benefit from it. Many businesses waste resources trying to build complex, custom models when they could integrate existing AI tools to solve workflows. At AgenticaSoft, we help startups integrate AI APIs and machine learning models directly into their current websites, SaaS products, internal tools, and databases. Whether you want to add AI text generation, automated image processing, data sorting, or predictive analytics to your workflows, we build the connection pipelines. We focus on right-sized AI integration that delivers clear business results without enterprise-level complexity.
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
                        <h5>Manual Data Processing</h5>
                        <p>Your team is manually reviewing, tag-sorting, translating, or writing text, files, and documents that AI APIs could handle in seconds.</p>
                    </div>
                </div>
                <div class="pain-point-item">
                    <i class="fas fa-times-circle"></i>
                    <div class="pain-point-text">
                        <h5>Complex API Setup</h5>
                        <p>You want to add AI features (like OpenAI, Claude, or Midjourney APIs) to your product but lack the engineering capacity to build it.</p>
                    </div>
                </div>
                <div class="pain-point-item">
                    <i class="fas fa-times-circle"></i>
                    <div class="pain-point-text">
                        <h5>Predictive Data Gaps</h5>
                        <p>You have databases of customer data, but you aren't utilizing predictive models to forecast sales, analyze churn, or make decisions.</p>
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
                    <i class="fas fa-link"></i>
                </div>
                <h3>AI API Integration</h3>
                <p>We connect your software to leading AI APIs like OpenAI, Anthropic Claude, Google Gemini, Pinecone, or LangChain to add intelligent automation to your platform.</p>
            </div>
            <div class="deliverable-card">
                <div class="deliverable-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <h3>Machine Learning Models</h3>
                <p>We set up classification models, recommendation engines, and neural networks tailored to analyze your business data and user behavior patterns.</p>
            </div>
            <div class="deliverable-card">
                <div class="deliverable-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Predictive Analytics Systems</h3>
                <p>We integrate tools that analyze user trends to predict churn, forecast sales volumes, optimize pricing, and highlight opportunities.</p>
            </div>
            <div class="deliverable-card">
                <div class="deliverable-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Intelligent Workflow Automation</h3>
                <p>We connect document scanners, OCR tools, and auto-taggers to your file systems, allowing AI to process, organize, and summarize documents.</p>
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
                    <h4>System &amp; Data Audit</h4>
                    <p>We audit your systems, databases, and tools to identify the highest-ROI opportunities to add AI models.</p>
                </div>
            </div>
            <div class="timeline-step reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-num">Step 02</span>
                    <h4>Architecture &amp; Model Match</h4>
                    <p>We select the right APIs, vector databases, or models (like Llama, OpenAI, or Hugging Face) for your needs and budget.</p>
                </div>
            </div>
            <div class="timeline-step reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-num">Step 03</span>
                    <h4>Integration &amp; Pipeline Build</h4>
                    <p>We write connection scripts, set up vector indexes, build secure API pipelines, and update your user interface to support the new features.</p>
                </div>
            </div>
            <div class="timeline-step reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-num">Step 04</span>
                    <h4>Data Testing &amp; Calibration</h4>
                    <p>We test the integrations with real data, calibrate weights, refine prompt contexts, and optimize processing costs.</p>
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
                <h3>Working Code, No Slide Decks</h3>
                <p>We are engineers, not consultants. We don't deliver slide decks with AI advice—we deliver working code, connected APIs, and functional database integrations.</p>
            </div>
            <div class="why-card reveal" style="transition-delay: 0.1s;">
                <div class="why-card-icon">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <h3>Cost-Optimized Architecture</h3>
                <p>AI API calls can become expensive. We design caching layers, batch processes, and token-saving pipelines to keep API bills low.</p>
            </div>
            <div class="why-card reveal" style="transition-delay: 0.2s;">
                <div class="why-card-icon">
                    <i class="fas fa-code-branch"></i>
                </div>
                <h3>Right-Sized Integrations</h3>
                <p>We avoid over-engineering. If a simple python script or off-the-shelf model gets the job done, we choose that, saving you development costs.</p>
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
                        API connections (like OpenAI/Anthropic integration) start at $1,500. Custom vector database setups, recommendation engines, and custom model integrations range from $3,500 to $8,000.
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
                Get answers to common queries about our AI Integration Services services.
            </p>
        </div>

        <div class="faq-grid" style="max-width: 800px; margin: 0 auto; display: flex; flex-direction: column; gap: 1rem;">
            
            <div class="glass-card faq-item reveal" style="transition-delay: 0s;">
                <div class="faq-question">
                    <h4>What's the difference between AI integration and a custom chatbot?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>An AI chatbot is a customer-facing conversational interface built for support. AI integration is a broader backend service where we embed intelligent algorithms (like data categorizers, translation engines, or image analyzers) into your software.</p>
                </div>
            </div>
            <div class="glass-card faq-item reveal" style="transition-delay: 0.05s;">
                <div class="faq-question">
                    <h4>Do I need my own database of data to use AI or ML?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Not necessarily. If we are integrating OpenAI or Claude for content generation, OCR, or translations, we utilize their pre-trained models. However, to build predictive analysis, search systems, or recommendations, we need access to your business data.</p>
                </div>
            </div>
            <div class="glass-card faq-item reveal" style="transition-delay: 0.1s;">
                <div class="faq-question">
                    <h4>What does &quot;predictive analytics&quot; actually mean for a small business?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>It means using algorithms to analyze patterns in your historical customer data to forecast future outcomes. For example, predicting which users are likely to cancel their subscriptions next month, or forecasting next quarter's inventory needs.</p>
                </div>
            </div>
            <div class="glass-card faq-item reveal" style="transition-delay: 0.15s;">
                <div class="faq-question">
                    <h4>Is AI integration expensive—can a bootstrapped startup afford it?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, by utilizing existing public APIs and open-source models, we keep development costs low. We build modularly, allowing you to launch an initial AI feature for a small budget and scale it as your user base grows.</p>
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
                        <option value="AI Integration Services" selected>AI Integration Services</option>
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
            <li><a href="/services/ai-chatbot-development">AI Chatbots</a></li><li><a href="/services/workflow-automation">Workflow Automation</a></li><li><a href="/services/custom-software-development">Custom Software</a></li>
            <li><a href="/blog" style="color: var(--primary-light);">Our Blog</a></li>
            <li><a href="/#lead-magnet" style="color: var(--accent-color); font-weight: 500;">Lead Magnet: Tech Stack Checklist</a></li>
        </ul>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
