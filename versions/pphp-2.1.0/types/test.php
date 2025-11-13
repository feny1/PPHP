<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($vars['TITLE'] ?? 'PPHP Test') ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 20px;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        
        h1 {
            color: #667eea;
            font-size: 36px;
            margin-bottom: 10px;
            text-align: center;
        }
        
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 40px;
            font-size: 18px;
        }
        
        .section {
            margin-bottom: 40px;
            padding: 30px;
            background: #f8f9fa;
            border-radius: 15px;
            border-left: 5px solid #667eea;
        }
        
        .section-title {
            font-size: 24px;
            color: #667eea;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .code-label {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 4px 12px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .item {
            background: white;
            padding: 15px 20px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .item strong {
            color: #667eea;
            display: inline-block;
            min-width: 150px;
        }
        
        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        
        .tag {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 15px;
        }
        
        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .card h3 {
            color: #667eea;
            margin-bottom: 10px;
            font-size: 18px;
        }
        
        .card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 8px;
        }
        
        .card .meta {
            color: #999;
            font-size: 14px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        th {
            background: #667eea;
            color: white;
            font-weight: 600;
        }
        
        tr:hover {
            background: #f8f9fa;
        }
        
        .social-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            background: white;
            border-radius: 10px;
            text-decoration: none;
            color: #333;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin: 5px;
        }
        
        .social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .icon {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($vars['HEADING'] ?? 'PPHP Examples') ?></h1>
        <p class="subtitle"><?= htmlspecialchars($vars['DESCRIPTION'] ?? '') ?></p>
        
        <!-- Simple Variables Section -->
        <div class="section">
            <h2 class="section-title">📝 Simple Variables</h2>
            <div class="code-label">KEY = VALUE</div>
            <div class="item">
                <strong>Name:</strong> <?= htmlspecialchars($vars['NAME'] ?? 'N/A') ?>
            </div>
            <div class="item">
                <strong>Email:</strong> <?= htmlspecialchars($vars['EMAIL'] ?? 'N/A') ?>
            </div>
            <div class="item">
                <strong>Website:</strong> <a href="<?= htmlspecialchars($vars['WEBSITE'] ?? '#') ?>"><?= htmlspecialchars($vars['WEBSITE'] ?? 'N/A') ?></a>
            </div>
            <div class="item">
                <strong>Age:</strong> <?= htmlspecialchars($vars['AGE'] ?? 'N/A') ?>
            </div>
            <div class="item">
                <strong>Experience:</strong> <?= htmlspecialchars($vars['EXPERIENCE'] ?? 'N/A') ?> years
            </div>
        </div>
        
        <!-- Lists Section -->
        <div class="section">
            <h2 class="section-title">📋 Lists with &lt;&lt;LIST&gt;&gt;</h2>
            <div class="code-label">KEY = &lt;&lt;LIST&gt;&gt; Item1 | Item2 | Item3</div>
            
            <h3 style="margin-top: 20px; margin-bottom: 10px;">Skills:</h3>
            <div class="tags">
                <?php if (isset($vars['SKILLS']) && is_array($vars['SKILLS'])): ?>
                    <?php foreach ($vars['SKILLS'] as $skill): ?>
                        <span class="tag"><?= htmlspecialchars($skill) ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <h3 style="margin-top: 20px; margin-bottom: 10px;">Hobbies:</h3>
            <div class="tags">
                <?php if (isset($vars['HOBBIES']) && is_array($vars['HOBBIES'])): ?>
                    <?php foreach ($vars['HOBBIES'] as $hobby): ?>
                        <span class="tag"><?= htmlspecialchars($hobby) ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <h3 style="margin-top: 20px; margin-bottom: 10px;">Menu Items:</h3>
            <div class="tags">
                <?php if (isset($vars['MENU_ITEMS']) && is_array($vars['MENU_ITEMS'])): ?>
                    <?php foreach ($vars['MENU_ITEMS'] as $item): ?>
                        <span class="tag"><?= htmlspecialchars($item) ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Single Object Section -->
        <div class="section">
            <h2 class="section-title">📦 Single Object with &lt;&lt;OBJECT&gt;&gt;</h2>
            <div class="code-label">KEY = &lt;&lt;OBJECT&gt;&gt; key1 => value1, key2 => value2</div>
            
            <h3 style="margin-top: 20px; margin-bottom: 10px;">User Info:</h3>
            <?php if (isset($vars['USER_INFO']) && is_array($vars['USER_INFO'])): ?>
                <?php foreach ($vars['USER_INFO'] as $key => $value): ?>
                    <div class="item">
                        <strong><?= htmlspecialchars(ucfirst($key)) ?>:</strong> <?= htmlspecialchars($value) ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            
            <h3 style="margin-top: 20px; margin-bottom: 10px;">Settings:</h3>
            <?php if (isset($vars['SETTINGS']) && is_array($vars['SETTINGS'])): ?>
                <?php foreach ($vars['SETTINGS'] as $key => $value): ?>
                    <div class="item">
                        <strong><?= htmlspecialchars(ucfirst($key)) ?>:</strong> <?= htmlspecialchars($value) ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            
            <h3 style="margin-top: 20px; margin-bottom: 10px;">Contact:</h3>
            <?php if (isset($vars['CONTACT']) && is_array($vars['CONTACT'])): ?>
                <?php foreach ($vars['CONTACT'] as $key => $value): ?>
                    <div class="item">
                        <strong><?= htmlspecialchars(ucfirst($key)) ?>:</strong> <?= htmlspecialchars($value) ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <!-- Array of Objects Section -->
        <div class="section">
            <h2 class="section-title">📚 Array of Objects with &lt;&lt;OBJECTS&gt;&gt;</h2>
            <div class="code-label">KEY = &lt;&lt;OBJECTS&gt;&gt; key1 => value1, key2 => value2 | key1 => value3, key2 => value4</div>
            
            <h3 style="margin-top: 20px; margin-bottom: 10px;">Team Members:</h3>
            <div class="card-grid">
                <?php if (isset($vars['TEAM_MEMBERS']) && is_array($vars['TEAM_MEMBERS'])): ?>
                    <?php foreach ($vars['TEAM_MEMBERS'] as $member): ?>
                        <div class="card">
                            <h3><?= htmlspecialchars($member['name'] ?? 'N/A') ?></h3>
                            <p><strong>Role:</strong> <?= htmlspecialchars($member['role'] ?? 'N/A') ?></p>
                            <p class="meta">📧 <?= htmlspecialchars($member['email'] ?? 'N/A') ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <h3 style="margin-top: 30px; margin-bottom: 10px;">Portfolio Items:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Project Title</th>
                        <th>Technology</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($vars['PORTFOLIO_ITEMS']) && is_array($vars['PORTFOLIO_ITEMS'])): ?>
                        <?php foreach ($vars['PORTFOLIO_ITEMS'] as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['title'] ?? 'N/A') ?></td>
                                <td><?= htmlspecialchars($item['tech'] ?? 'N/A') ?></td>
                                <td><?= htmlspecialchars($item['year'] ?? 'N/A') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <h3 style="margin-top: 30px; margin-bottom: 10px;">Social Links:</h3>
            <div style="margin-top: 15px;">
                <?php if (isset($vars['SOCIAL_LINKS']) && is_array($vars['SOCIAL_LINKS'])): ?>
                    <?php foreach ($vars['SOCIAL_LINKS'] as $link): ?>
                        <a href="<?= htmlspecialchars($link['url'] ?? '#') ?>" class="social-link" target="_blank">
                            <span class="icon"><?= htmlspecialchars($link['icon'] ?? '🔗') ?></span>
                            <span><?= htmlspecialchars($link['platform'] ?? 'Link') ?></span>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <h3 style="margin-top: 30px; margin-bottom: 10px;">Services:</h3>
            <div class="card-grid">
                <?php if (isset($vars['SERVICES']) && is_array($vars['SERVICES'])): ?>
                    <?php foreach ($vars['SERVICES'] as $service): ?>
                        <div class="card">
                            <h3><?= htmlspecialchars($service['name'] ?? 'N/A') ?></h3>
                            <p><?= htmlspecialchars($service['description'] ?? 'N/A') ?></p>
                            <p class="meta"><strong>Starting at:</strong> <?= htmlspecialchars($service['price'] ?? 'N/A') ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 40px; padding-top: 40px; border-top: 2px solid #eee;">
            <p style="color: #666; font-size: 16px;">
                🚀 <strong>PPHP</strong> - Making web development simple and elegant
            </p>
            <p style="color: #999; font-size: 14px; margin-top: 10px;">
                All examples are live and powered by PPHP syntax
            </p>
        </div>
    </div>
</body>
</html>
