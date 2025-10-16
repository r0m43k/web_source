<?php
$ttl = 900;
$last = @filemtime(__FILE__) ?: time();
$size = @filesize(__FILE__) ?: 0;
$etag = '"' . md5(__FILE__ . '|' . $last . '|' . $size) . '"';

header('Cache-Control: public, max-age=' . $ttl . ', s-maxage=' . $ttl . ', immutable');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $last) . ' GMT');
header('ETag: ' . $etag);

if (
    (isset($_SERVER['HTTP_IF_NONE_MATCH']) && trim($_SERVER['HTTP_IF_NONE_MATCH']) === $etag) ||
    (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $last)
) {
    http_response_code(304);
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home</title>
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/sakura.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<div class="container">
    <h1>Pr1v1l3g3 3sc4l4t10n h4v3 d0n3 c0mp13tly</h1>
    <h2>Av01d c4ch3 p01s0n1ng</h2>
    <p>Try to h4cK m3</p>
    <div style="margin-top:12px">
        <li class="nav__item <?= $app === 'reviews' ? 'active' : '' ?>">
            <a href="/?app=users&view=list" class="nav__link">Users</a>
        </li>
        <li class="nav__item <?= $app === 'reviews' ? 'active' : '' ?>">
            <a href="/?app=recipes&view=index" class="nav__link">Recipes</a>
        </li>
        <li class="nav__item <?= $app === 'reviews' ? 'active' : '' ?>">
            <a href="/?app=reviews&view=index" class="nav__link">Reviews</a>
        </li>
    </div>
</div>

</body>
</html>
