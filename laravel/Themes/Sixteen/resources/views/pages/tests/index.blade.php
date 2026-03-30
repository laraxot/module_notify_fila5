<?php

declare(strict_types=1);

$manifest = require base_path('Themes/Sixteen/resources/design-comuni/manifest.php');
$grouped = [];

foreach ($manifest as $slug => $page) {
    $grouped[$page['category']][$slug] = $page;
}

ksort($grouped);
?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FixCity Tests - Design Comuni</title>
    <style>
        body { font-family: system-ui, sans-serif; margin: 0; background: #f5f7fa; color: #17324d; }
        .wrap { max-width: 1100px; margin: 0 auto; padding: 40px 20px 80px; }
        h1 { margin: 0 0 12px; }
        p { line-height: 1.6; }
        section { margin-top: 32px; }
        ul { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 12px; list-style: none; padding: 0; }
        li { background: #fff; border: 1px solid #d9e2ec; border-radius: 12px; }
        a { display: block; padding: 16px; color: inherit; text-decoration: none; }
        a:hover { background: #eef4fb; }
        small { display: block; margin-top: 6px; color: #486581; }
        code { background: #e4ecf5; border-radius: 6px; padding: 2px 6px; }
    </style>
</head>
<body>
    <div class="wrap">
        <h1>Design Comuni static pages in FixCity</h1>
        <p>Replica locale dei template ufficiali di <code>design-comuni-pagine-statiche</code> sotto <code>/it/tests/*</code>.</p>
        <?php foreach ($grouped as $category => $pages): ?>
            <section>
                <h2><?= e($category) ?></h2>
                <ul>
                    <?php foreach ($pages as $slug => $page): ?>
                        <li>
                            <a href="<?= url('/it/tests/'.$slug) ?>">
                                <?= e($page['title']) ?>
                                <small>/it/tests/<?= e($slug) ?></small>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endforeach; ?>
    </div>
</body>
</html>
