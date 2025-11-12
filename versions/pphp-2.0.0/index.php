<?php

/*


   |||||||||   |||||||||   |\     ||    \\    //
   ||          ||          ||\\   ||     \\  //
   |||||||||   |||||||||   || \\  ||      \\//
   ||          ||          ||  \\ ||       ||
   ||          ||          ||   \\||       ||
   ||          |||||||||   ||    \||       ||


   @author     Ehab Yar
   @website    https://eny.sa
   @date       2024-11-11

*/





// PPHP Interpreter - Simple and clean entry point
$requestedPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($requestedPath === '/') {
    $pphpFile = 'page.pphp'; // Default file
} else {
    $pphpFile = ltrim($requestedPath, '/') . '.pphp';
}

// Check if PPHP file exists
if (!file_exists($pphpFile)) {
    echo "PPHP file not found: $pphpFile";
    exit;
}

// Parse PPHP file
$content = file_get_contents($pphpFile);
$lines = explode("\n", $content);
$vars = [];

foreach ($lines as $line) {
    $line = trim($line);
    if ($line !== '' && strpos($line, '=') !== false) {
        list($key, $value) = explode('=', $line, 2);
        // if the variable key contains <<LIST>> explode with |
        if (strpos($value, '<<LIST>>') !== false) {
            $value = str_replace('<<LIST>>', '', $value);
            $items = explode('|', $value);
            //remove empty items and trim spaces
            $items = array_filter($items);
            $vars[trim($key)] = array_map('trim', $items);
            continue;
        }
        // i want the list can have objects like {k1 => v1,k2 => v2,k3 => v3}
        
        if (strpos($value, '<<OBJECT>>') !== false) {
            $value = str_replace('<<OBJECT>>', '', $value);
            $items = explode(',', $value);
            $obj = [];
            foreach ($items as $item) {
                if (strpos($item, '=>') !== false) {
                    list($k, $v) = explode('=>', $item, 2);
                    $obj[trim($k)] = trim($v);
                }
            }
            $vars[trim($key)] = $obj;
            continue;
        }
        
        // i want the list can have objects like {k1 => v1,k2 => v2,k3 => v3}
        if (strpos($value, '<<OBJECTS>>') !== false) {
            $value = str_replace('<<OBJECTS>>', '', $value);
            $items = explode('|', $value);
            $obj = [];
            foreach ($items as $item) {
                $objItem = [];
                $pairs = explode(',', $item);
                foreach ($pairs as $pair) {
                    if (strpos($pair, '=>') !== false) {
                        list($k, $v) = explode('=>', $pair, 2);
                        $objItem[trim($k)] = trim($v);
                    }
                }
                $obj[] = $objItem;
            }
            $vars[trim($key)] = $obj;
            continue;
        }
        $vars[trim($key)] = trim($value);
    }
}

// Render based on TYPE
$type = $vars['TYPE'] ?? 'dashboard';
$templateFile = "./types/$type.php";

if (file_exists($templateFile)) {
    include $templateFile;
} else {
    // Fallback inline template
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($vars['TITLE'] ?? 'PPHP') ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
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
        }
        h1 { color: #333; font-size: 42px; margin-bottom: 20px; }
        p { color: #666; font-size: 18px; line-height: 1.6; }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($vars['HEADING'] ?? 'PPHP Page') ?></h1>
        <p><?= htmlspecialchars($vars['DESCRIPTION'] ?? 'Welcome to PPHP!') ?></p>
    </div>
</body>
</html>
<?php
}
exit;
?>