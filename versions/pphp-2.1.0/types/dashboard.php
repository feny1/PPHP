 <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($vars['TITLE'][0] ?? 'PPHP Dashboard') ?></title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }

            .container {
                background: rgba(255, 255, 255, 0.95);
                border-radius: 20px;
                padding: 60px 80px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                text-align: center;
                max-width: 600px;
                animation: fadeIn 0.8s ease-in;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .logo {
                font-size: 72px;
                margin-bottom: 20px;
                animation: bounce 2s infinite;
            }

            @keyframes bounce {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            h1 {
                color: #333;
                font-size: 42px;
                margin-bottom: 15px;
                font-weight: 700;
            }

            .welcome {
                color: #667eea;
                font-size: 28px;
                font-weight: 600;
                margin-bottom: 20px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            }

            .description {
                color: #666;
                font-size: 18px;
                line-height: 1.6;
                margin-bottom: 30px;
            }

            .features {
                display: flex;
                justify-content: space-around;
                margin-top: 40px;
                gap: 20px;
            }

            .feature {
                flex: 1;
                padding: 20px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border-radius: 12px;
                color: white;
                transition: transform 0.3s ease;
            }

            .feature:hover {
                transform: translateY(-5px);
            }

            .feature-icon {
                font-size: 36px;
                margin-bottom: 10px;
            }

            .feature-title {
                font-size: 16px;
                font-weight: 600;
            }

            .footer {
                margin-top: 40px;
                color: #999;
                font-size: 14px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="logo">🚀</div>
            <div class="welcome">
                <?= htmlspecialchars($vars['WELCOMING'][0] ?? 'Hello & Welcome!') ?>
            </div>
            <p class="description">
                <?= htmlspecialchars($vars['DESCRIPTION'][0] ?? 'Your PPHP application is ready!') ?>
            </p>
            <div class="features">
                <?php foreach ($vars['FEATURE'] ?? [] as $feature): ?>
                    <div class="feature">
                        <div class="feature-title"><?= htmlspecialchars($feature ?? 'Feature Title') ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="footer">
                &copy; 2025 PPHP Framework
            </div>
        </div>
    </body>

    </html>