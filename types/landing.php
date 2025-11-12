<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($vars['DESCRIPTION'] ?? 'PPHP - A minimal template language') ?>">
    <title><?= htmlspecialchars($vars['TITLE'] ?? 'PPHP - Page PHP') ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary: #667eea;
            --primary-dark: #5568d3;
            --secondary: #764ba2;
            --text-dark: #1a202c;
            --text-gray: #4a5568;
            --text-light: #718096;
            --bg-light: #f7fafc;
            --bg-white: #ffffff;
            --border: #e2e8f0;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }
        
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }
        
        .nav-links a {
            color: var(--text-gray);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        /* Hero Section */
        .hero {
            padding: 8rem 2rem 6rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        .hero h2 {
            font-size: 1.5rem;
            font-weight: 400;
            margin-bottom: 1rem;
            opacity: 0.95;
        }
        
        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 0.875rem 2rem;
            font-size: 1.125rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: white;
            color: var(--primary);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }
        
        .btn-secondary:hover {
            background: white;
            color: var(--primary);
        }
        
        /* Section Styles */
        section {
            padding: 5rem 2rem;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }
        
        .section-subtitle {
            text-align: center;
            font-size: 1.25rem;
            color: var(--text-gray);
            margin-bottom: 4rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background: var(--bg-white);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            transition: all 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
            color: var(--text-dark);
        }
        
        .feature-card p {
            color: var(--text-gray);
            line-height: 1.7;
        }
        
        /* Code Examples */
        .examples {
            background: var(--bg-light);
        }
        
        .examples-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 3rem;
        }
        
        .example-card {
            background: var(--bg-white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
        }
        
        .example-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1.5rem;
            font-weight: 600;
            font-size: 1.25rem;
        }
        
        .example-code {
            padding: 2rem;
            background: #1e1e1e;
            color: #d4d4d4;
            font-family: 'Courier New', monospace;
            font-size: 0.95rem;
            line-height: 1.8;
            overflow-x: auto;
        }
        
        /* Stats */
        .stats {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            text-align: center;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .stat-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .stat-description {
            opacity: 0.9;
        }
        
        /* Testimonials */
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }
        
        .testimonial-card {
            background: var(--bg-white);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            border-left: 4px solid var(--primary);
        }
        
        .testimonial-quote {
            font-size: 1.125rem;
            font-style: italic;
            color: var(--text-gray);
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .testimonial-info h4 {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .testimonial-info p {
            color: var(--text-light);
            font-size: 0.875rem;
        }
        
        .rating {
            color: #fbbf24;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }
        
        /* CTA Section */
        .cta-section {
            background: var(--bg-light);
            text-align: center;
        }
        
        .cta-content {
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Footer */
        footer {
            background: var(--text-dark);
            color: white;
            padding: 3rem 2rem 2rem;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 2rem;
        }
        
        .footer-section h3 {
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-links a {
            color: #cbd5e0;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 1.25rem;
            transition: all 0.3s;
        }
        
        .social-link:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #cbd5e0;
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .nav-links {
                display: none;
            }
            
            .examples-grid {
                grid-template-columns: 1fr;
            }
            
            section {
                padding: 3rem 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <div class="logo">PPHP</div>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#examples">Examples</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="https://github.com/feny1/PPHP">GitHub</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1><?= htmlspecialchars($vars['HERO_TITLE'] ?? 'PPHP') ?></h1>
            <h2><?= htmlspecialchars($vars['HERO_SUBTITLE'] ?? '') ?></h2>
            <p><?= htmlspecialchars($vars['HERO_DESCRIPTION'] ?? '') ?></p>
            <div class="cta-buttons">
                <a href="https://github.com/feny1/PPHP/raw/main/versions/pphp-2.0.0.zip" class="btn btn-primary">
                    <?= htmlspecialchars($vars['CTA_PRIMARY'] ?? 'Get Started') ?>
                </a>
                <a href="https://github.com/feny1/PPHP" class="btn btn-secondary">
                    <?= htmlspecialchars($vars['CTA_SECONDARY'] ?? 'Documentation') ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features">
        <div class="container">
            <h2 class="section-title">Why Choose PPHP?</h2>
            <p class="section-subtitle">Powerful features designed for modern web development</p>
            <div class="features-grid">
                <?php if (isset($vars['FEATURES']) && is_array($vars['FEATURES'])): ?>
                    <?php foreach ($vars['FEATURES'] as $feature): ?>
                        <div class="feature-card">
                            <span class="feature-icon"><?= htmlspecialchars($feature['icon'] ?? '✨') ?></span>
                            <h3><?= htmlspecialchars($feature['title'] ?? '') ?></h3>
                            <p><?= htmlspecialchars($feature['description'] ?? '') ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Code Examples Section -->
    <section id="examples" class="examples">
        <div class="container">
            <h2 class="section-title">Simple, Yet Powerful</h2>
            <p class="section-subtitle">See how easy it is to work with PPHP</p>
            <div class="examples-grid">
                <div class="example-card">
                    <div class="example-header"><?= htmlspecialchars($vars['EXAMPLE_SIMPLE_TITLE'] ?? 'Example') ?></div>
                    <pre class="example-code"><?= htmlspecialchars(str_replace('\n', "\n", $vars['EXAMPLE_SIMPLE_CODE'] ?? '')) ?></pre>
                </div>
                <div class="example-card">
                    <div class="example-header"><?= htmlspecialchars($vars['EXAMPLE_LIST_TITLE'] ?? 'Example') ?></div>
                    <pre class="example-code"><?php foreach ($vars['EXAMPLE_LIST_CODE'] ?? '' as $line){
    echo htmlspecialchars(str_replace('\n', "\n", $line)) . "<br>";
                    } ?>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <?php if (isset($vars['STATS']) && is_array($vars['STATS'])): ?>
                    <?php foreach ($vars['STATS'] as $stat): ?>
                        <div class="stat-item">
                            <span class="stat-number"><?= htmlspecialchars($stat['number'] ?? '') ?></span>
                            <div class="stat-title"><?= htmlspecialchars($stat['title'] ?? '') ?></div>
                            <div class="stat-description"><?= htmlspecialchars($stat['description'] ?? '') ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials">
        <div class="container">
            <h2 class="section-title">Loved by Developers</h2>
            <!-- <p class="section-subtitle">See what developers are saying about PPHP</p> -->
            <div class="testimonials-grid">
                <?php if (isset($vars['TESTIMONIALS']) && is_array($vars['TESTIMONIALS'])): ?>
                    <?php foreach ($vars['TESTIMONIALS'] as $testimonial): ?>
                        <div class="testimonial-card">
                            <div class="rating">
                                <?php 
                                $rating = intval($testimonial['rating'] ?? 5);
                                echo str_repeat('⭐', $rating);
                                ?>
                            </div>
                            <p class="testimonial-quote">"<?= htmlspecialchars($testimonial['quote'] ?? '') ?>"</p>
                            <div class="testimonial-author">
                                <div class="testimonial-info">
                                    <h4><?= htmlspecialchars($testimonial['author'] ?? '') ?></h4>
                                    <p><?= htmlspecialchars($testimonial['role'] ?? '') ?> at <?= htmlspecialchars($testimonial['company'] ?? '') ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="section-title"><?= htmlspecialchars($vars['CTA_TITLE'] ?? 'Get Started Today') ?></h2>
                <p class="section-subtitle"><?= htmlspecialchars($vars['CTA_DESCRIPTION'] ?? '') ?></p>
                <a href="https://github.com/feny1/PPHP/raw/main/versions/pphp-2.0.0.zip" class="btn btn-primary">
                    <?= htmlspecialchars($vars['CTA_BUTTON'] ?? 'Download Now') ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3>PPHP</h3>
                    <p><?= htmlspecialchars($vars['FOOTER_TAGLINE'] ?? '') ?></p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <?php if (isset($vars['FOOTER_LINKS']) && is_array($vars['FOOTER_LINKS'])): ?>
                            <?php foreach ($vars['FOOTER_LINKS'] as $link): ?>
                                <li><a href="<?= htmlspecialchars($link['url'] ?? '#') ?>"><?= htmlspecialchars($link['text'] ?? '') ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Connect</h3>
                    <div class="social-links">
                        <?php if (isset($vars['FOOTER_SOCIAL']) && is_array($vars['FOOTER_SOCIAL'])): ?>
                            <?php foreach ($vars['FOOTER_SOCIAL'] as $social): ?>
                                <a href="<?= htmlspecialchars($social['url'] ?? '#') ?>" class="social-link" title="<?= htmlspecialchars($social['platform'] ?? '') ?>">
                                    <?= htmlspecialchars($social['icon'] ?? '🔗') ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?= htmlspecialchars($vars['YEAR'] ?? date('Y')) ?> PPHP. Created by <a href="<?= htmlspecialchars($vars['AUTHOR_WEBSITE'] ?? '#') ?>" style="color: var(--primary);"><?= htmlspecialchars($vars['AUTHOR'] ?? '') ?></a></p>
            </div>
        </div>
    </footer>
</body>
</html>
