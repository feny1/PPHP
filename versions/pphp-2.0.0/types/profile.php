<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($vars['TITLE'] ?? 'Profile') ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #7e22ce 100%);
            min-height: 100vh;
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Animated background particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }
        
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 20s infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            25% { transform: translateY(-100px) translateX(50px); }
            50% { transform: translateY(-200px) translateX(-50px); }
            75% { transform: translateY(-100px) translateX(100px); }
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.4);
            animation: slideUp 0.8s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 60px 40px 140px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .profile-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }
        
        .profile-avatar {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 8px solid white;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 72px;
            margin: 0 auto;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            animation: pulse 3s infinite;
            position: relative;
            z-index: 1;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .profile-content {
            padding: 0 40px 40px;
            margin-top: -80px;
            position: relative;
            z-index: 2;
        }
        
        .profile-info {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 30px;
        }
        
        .profile-name {
            font-size: 36px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }
        
        .profile-role {
            font-size: 20px;
            color: #667eea;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .profile-bio {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }
        
        .stat-icon {
            font-size: 42px;
            margin-bottom: 15px;
            display: block;
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 14px;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .skills {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        
        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .skill-tag {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        
        .skill-tag:hover {
            transform: translateY(-3px) scale(1.05);
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .social-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-decoration: none;
            cursor: pointer;
        }
        
        .social-btn:hover {
            transform: translateY(-5px) rotate(5deg);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .social-btn.github { color: #333; }
        .social-btn.twitter { color: #1da1f2; }
        .social-btn.linkedin { color: #0077b5; }
        .social-btn.email { color: #ea4335; }
        
        @media (max-width: 768px) {
            .profile-header {
                padding: 40px 20px 100px;
            }
            
            .profile-avatar {
                width: 140px;
                height: 140px;
                font-size: 56px;
            }
            
            .profile-content {
                padding: 0 20px 30px;
            }
            
            .profile-info,
            .skills {
                padding: 30px 20px;
            }
            
            .profile-name {
                font-size: 28px;
            }
            
            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Animated background -->
    <div class="particles">
        <div class="particle" style="width: 80px; height: 80px; top: 10%; left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="width: 60px; height: 60px; top: 20%; left: 80%; animation-delay: 2s;"></div>
        <div class="particle" style="width: 100px; height: 100px; top: 60%; left: 15%; animation-delay: 4s;"></div>
        <div class="particle" style="width: 70px; height: 70px; top: 70%; left: 75%; animation-delay: 1s;"></div>
        <div class="particle" style="width: 50px; height: 50px; top: 40%; left: 50%; animation-delay: 3s;"></div>
    </div>

    <div class="container">
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar">
                    <?= htmlspecialchars($vars['AVATAR'] ?? '👤') ?>
                </div>
            </div>
            
            <div class="profile-content">
                <div class="profile-info">
                    <h1 class="profile-name"><?= htmlspecialchars($vars['NAME'] ?? 'John Doe') ?></h1>
                    <div class="profile-role"><?= htmlspecialchars($vars['ROLE'] ?? 'Full Stack Developer') ?></div>
                    <p class="profile-bio">
                        <?= htmlspecialchars($vars['BIO'] ?? 'Passionate developer creating amazing web experiences. Love coding and solving complex problems.') ?>
                    </p>
                </div>
                
                <div class="stats">
                    <div class="stat-card">
                        <span class="stat-icon">💼</span>
                        <div class="stat-value"><?= htmlspecialchars($vars['PROJECTS'] ?? '50+') ?></div>
                        <div class="stat-label">Projects</div>
                    </div>
                    <div class="stat-card">
                        <span class="stat-icon">⭐</span>
                        <div class="stat-value"><?= htmlspecialchars($vars['EXPERIENCE'] ?? '5+') ?></div>
                        <div class="stat-label">Years Exp</div>
                    </div>
                    <div class="stat-card">
                        <span class="stat-icon">🏆</span>
                        <div class="stat-value"><?= htmlspecialchars($vars['AWARDS'] ?? '12') ?></div>
                        <div class="stat-label">Awards</div>
                    </div>
                </div>
                
                <div class="skills">
                    <h2 class="section-title">
                        <span>🚀</span>
                        <span>Skills & Expertise</span>
                    </h2>
                    <div class="skill-list">
                        <?php
                        foreach ($vars['SKILLS'] as $skill) {
                            echo '<span class="skill-tag">' . htmlspecialchars(trim($skill)) . '</span>';
                        }
                        ?>
                    </div>
                </div>
                
                <div class="skills">
                    <h2 class="section-title">
                        <span>🔗</span>
                        <span>Connect With Me</span>
                    </h2>
                    <div class="social-links">
                        <?php if (!empty($vars['GITHUB'])): ?>
                        <a href="<?= htmlspecialchars($vars['GITHUB']) ?>" class="social-btn github" title="GitHub">
                            💻
                        </a>
                        <?php endif; ?>
                        
                        <?php if (!empty($vars['TWITTER'])): ?>
                        <a href="<?= htmlspecialchars($vars['TWITTER']) ?>" class="social-btn twitter" title="Twitter">
                            🐦
                        </a>
                        <?php endif; ?>
                        
                        <?php if (!empty($vars['LINKEDIN'])): ?>
                        <a href="<?= htmlspecialchars($vars['LINKEDIN']) ?>" class="social-btn linkedin" title="LinkedIn">
                            💼
                        </a>
                        <?php endif; ?>
                        
                        <?php if (!empty($vars['EMAIL'])): ?>
                        <a href="mailto:<?= htmlspecialchars($vars['EMAIL']) ?>" class="social-btn email" title="Email">
                            ✉️
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
