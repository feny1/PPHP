# PPHP - Page PHP

[![Open on Reddit](https://img.shields.io/badge/Reddit-View%20community-orange?style=for-the-badge&logo=reddit)](https://www.reddit.com/r/pphp_language)

> **A minimal, elegant template language that keeps web development simple and clean.**

[![Install Extension](https://img.shields.io/badge/VS%20Code-Install%20Extension-blue?style=for-the-badge&logo=visual-studio-code)](https://marketplace.visualstudio.com/items?itemName=FenyEhabYar.pphp-extension)

## 🚀 Features

- **Zero Configuration** - Just write `.pphp` files with `KEY = VALUE` syntax
- **Beautiful Templates** - Pre-built, responsive designs ready to use
- **Clean Syntax** - Simple key-value pairs, no complex markup
- **Template System** - Modular templates in the `types/` folder
- **VS Code Support** - Syntax highlighting included

## 📁 Structure
```
📁 PPHP/
├── index.php                   # PPHP interpreter and renderer
├── types/                      # Template files
│   ├── profile.php            # 👤 Amazing profile page
│   ├── dashboard.php          # 📊 Dashboard template
│   └── welcome.php            # 👋 Welcome page
├── vscode-pphp-extension/     # VS Code syntax support
└── README.md                  # Documentation
```

## 🎯 Quick Start

### Download PPHP

[![Download PPHP v2.0.0 (Recommended)](https://img.shields.io/badge/Download-PPHP%20v2.0.0-success?style=for-the-badge&logo=github)](https://github.com/feny1/PPHP/raw/main/versions/pphp-2.0.0.zip)
[![Download PPHP v1.0.0](https://img.shields.io/badge/Download-PPHP%20v1.0.0-success?style=for-the-badge&logo=github)](https://github.com/feny1/PPHP/raw/main/versions/pphp-1.0.0.zip)
### 1. Create a PPHP file
Create any `.pphp` file with your content:

**Example: test.pphp**

![PPHP Example](https://github.com/feny1/PPHP/raw/main/images/image.png)
[The test.PPHP file](https://github.com/feny1/PPHP/raw/main/test.pphp)

**Example: profile.pphp**
```pphp
TYPE = profile
NAME = Alex Johnson
AVATAR = 👨‍💻
ROLE = Full Stack Developer
BIO = Building amazing web experiences
SKILLS = PHP,JavaScript,Python,React
GITHUB = https://github.com/yourusername
EMAIL = hello@example.com
```

### 2. Access in Browser
- Visit `http://localhost/` (loads default page)
- Or create routing to load specific `.pphp` files
- Templates auto-render based on `TYPE` variable

## 🎨 Available Templates

### Profile Template (`TYPE = profile`)
Stunning animated profile page featuring:
- � Gradient background with floating particles
- 👤 Large pulsing avatar display
- 📊 Interactive stats cards (Projects, Experience, Awards)
- � Animated skill tags with hover effects
- 🔗 Social media links with smooth animations
- 📱 Fully responsive mobile design
- ✨ Smooth fade-in and slide-up animations

**Required Variables:**
- `TYPE` = profile

**Optional Variables:**
- `TITLE` - Browser page title (default: "Profile")
- `AVATAR` - Emoji avatar: 👨‍💻, 👩‍💻, 🦸, 👨‍🎨, 👩‍🔬, etc.
- `BIO` - Short biography/description
- `PROJECTS` - Number of projects (e.g., "50+")
- `EXPERIENCE` - Years of experience (e.g., "5+")
- `AWARDS` - Number of awards won
- `SKILLS` - Comma-separated skill list
- `GITHUB` - GitHub profile URL
- `TWITTER` - Twitter profile URL
- `LINKEDIN` - LinkedIn profile URL
- `EMAIL` - Contact email address
-  make your own...

### Dashboard Template (`TYPE = dashboard`)
Modern welcome dashboard with gradient design and feature cards.

### Welcome Template (`TYPE = welcome`)
Simple, clean welcome page for getting started.

## 💻 How PPHP Works

1. **Parse** - `index.php` reads your `.pphp` file
2. **Extract** - Parses `KEY = VALUE` pairs into `$vars` array
3. **Load** - Includes template from `types/` based on `TYPE` variable
4. **Render** - Template uses `$vars` to display your content
5. **Done** - Beautiful page with zero complexity! ✨

## 🛠️ Creating Custom Templates

1. Create a new PHP file in `types/` folder (e.g., `types/portfolio.php`)
2. Use `$vars['KEY']` to access PPHP variables
3. Set `TYPE = portfolio` in your `.pphp` file
4. Access your new template automatically!

**Example Custom Template:**
```php
<!-- types/custom.php -->
<h1><?= htmlspecialchars($vars['TITLE'] ?? 'Default Title') ?></h1>
<p><?= htmlspecialchars($vars['CONTENT'] ?? 'Default content') ?></p>
```

```pphp
# mycustom.pphp
TYPE = custom
TITLE = My Custom Page
CONTENT = This is my custom content!
```

## 🎓 PPHP Syntax Rules

- One variable per line
- Format: `KEY = VALUE`
- Keys are case-sensitive
- Values are trimmed of whitespace
- No quotes needed around values
- Commas create arrays in templates (e.g., SKILLS)

### 📋 Lists with `<<LIST>>`

For creating arrays/lists in PPHP, use the `<<LIST>>` syntax with pipe `|` separators:

```pphp
ITEMS = <<LIST>> Item 1 | Item 2 | Item 3 | Item 4
TAGS = <<LIST>> Design | Development | Marketing
```

This will create an array in PHP:
```php
$vars['ITEMS'] = ['Item 1', 'Item 2', 'Item 3', 'Item 4'];
$vars['TAGS'] = ['Design', 'Development', 'Marketing'];
```

**How it works:**
- Add `<<LIST>>` after the `=` sign
- Separate items with pipe `|` character
- Items are automatically trimmed of whitespace
- Empty items are filtered out
- Perfect for navigation menus, tags, features lists, etc.

**Usage in templates:**
```php
<?php foreach ($vars['ITEMS'] as $item): ?>
    <li><?= htmlspecialchars($item) ?></li>
<?php endforeach; ?>
```

### 📦 Objects with `<<OBJECT>>`

For creating associative arrays (key-value objects) in PPHP:

```pphp
USER = <<OBJECT>> name => John Doe, email => john@example.com, role => Admin
CONFIG = <<OBJECT>> theme => dark, lang => en, timezone => UTC
```

This will create an associative array in PHP:
```php
$vars['USER'] = ['name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin'];
$vars['CONFIG'] = ['theme' => 'dark', 'lang' => 'en', 'timezone' => 'UTC'];
```

**How it works:**
- Add `<<OBJECT>>` after the `=` sign
- Use `key => value` pairs separated by commas
- Keys and values are automatically trimmed
- Perfect for configuration, user data, settings, etc.

**Usage in templates:**
```php
<p>Name: <?= htmlspecialchars($vars['USER']['name']) ?></p>
<p>Email: <?= htmlspecialchars($vars['USER']['email']) ?></p>
```

### 📚 Array of Objects with `<<OBJECTS>>`

For creating arrays containing multiple objects:

```pphp
TEAM = <<OBJECTS>> name => Alice, role => Developer | name => Bob, role => Designer | name => Carol, role => Manager
PRODUCTS = <<OBJECTS>> id => 1, name => Product A, price => 99 | id => 2, name => Product B, price => 149
```

This will create an array of associative arrays in PHP:
```php
$vars['TEAM'] = [
    ['name' => 'Alice', 'role' => 'Developer'],
    ['name' => 'Bob', 'role' => 'Designer'],
    ['name' => 'Carol', 'role' => 'Manager']
];
```

**How it works:**
- Add `<<OBJECTS>>` after the `=` sign
- Each object uses `key => value` pairs separated by commas
- Objects are separated by pipe `|` character
- Perfect for team members, product lists, portfolio items, etc.

**Usage in templates:**
```php
<?php foreach ($vars['TEAM'] as $member): ?>
    <div class="member">
        <h3><?= htmlspecialchars($member['name']) ?></h3>
        <p><?= htmlspecialchars($member['role']) ?></p>
    </div>
<?php endforeach; ?>
```

## 🔧 Installation

1. Clone or download this repository
2. Place in your web server directory
3. Ensure PHP is installed (5.4+)
4. Access `index.php` in your browser
5. Start creating `.pphp` files!

## 📝 Example Profile

```pphp
TYPE = profile
TITLE = John Doe - Developer
NAME = John Doe
AVATAR = 🧑‍💻
ROLE = Senior Full Stack Developer & Tech Lead
BIO = Passionate about creating elegant solutions to complex problems. 10+ years building scalable web applications and leading development teams.
PROJECTS = 100+
EXPERIENCE = 10+
AWARDS = 25
SKILLS = PPHP,PHP,JavaScript,TypeScript,React,Vue.js,Node.js,Python,Go,Docker,Kubernetes,MySQL,PostgreSQL,MongoDB,Redis,AWS,Git
GITHUB = https://github.com/johndoe
TWITTER = https://twitter.com/johndoe
LINKEDIN = https://linkedin.com/in/johndoe
EMAIL = john@example.com
```

## 🎯 Why PPHP?

- **Simple** - No complex syntax or learning curve
- **Fast** - Minimal processing overhead
- **Flexible** - Easy to extend with custom templates
- **Clean** - Separation of content and presentation
- **Fun** - Building pages feels effortless!

## 📄 License

Free to use and modify for your projects!

## 👨‍💻 Author

**Ehab Yar**
- Website: [https://eny.sa](https://eny.sa)
- Date Created: November 11, 2024

---

**Made with ❤️ for simplicity**
