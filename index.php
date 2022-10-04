<?php

session_start();

require_once './vendor/autoload.php';
require_once './tools/functions.php';
require_once './config/settings.php';

$loader = new \Twig\Loader\FilesystemLoader('./views');
$twig   = new \Twig\Environment($loader, [
    'cache' => APP['twigCache'],
    'debug' => APP['twigDebug'],
]);
$twig->addGlobal('session', $_SESSION);
$twig->addExtension(new \Twig\Extension\DebugExtension());


$uri = getUri();
if ($_SESSION['user'] ?? null || $uri == '/migration') {
    switch ($uri) {
        case '/':
            $page = 'home';

            break;
        

        default:
            $page = 'error';
    }
} else {
    $page = 'forms';
}

require_once controllers($page);
$template = $twig->load('pages/' . $page . 'View.twig');

echo $template->render(
    [
        'title' => $title ?? null,
        'data'  => $data ?? null,
    ]
);