
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= htmlspecialchars($vars['TITLE'][0] ?? 'Welcome to PPHP') ?>
        </title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                color: #333;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
                padding: 20px;
            }

            h1 {
                font-size: 36px;
                margin-bottom: 10px;
            }

            p {
                font-size: 18px;
                max-width: 600px;
                text-align: center;
            }
            .features {
                margin-top: 30px;
                display: flex;
                gap: 15px;
            }
        </style>
    </head>

    <body>
        <h1><?= htmlspecialchars($vars['WELCOMING'][0] ?? 'Hello & Welcome!') ?></h1>
        <p><?= htmlspecialchars($vars['DESCRIPTION'][0] ?? 'Your custom PPHP framework is ready to power amazing web applications. Start building something extraordinary today!') ?></p>
        <div class="features">
            <?php foreach ($vars['FEATURE'] ?? [] as $feature): ?>
                <div class="feature">
                    <h3><?= htmlspecialchars($feature ?? 'Feature Title') ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="features">
            <?php foreach ($vars['EXP'] ?? [] as $feature): ?>
                <div class="feature">
                    <h3><?= htmlspecialchars($feature ?? 'Feature Title') ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </body>

    </html>