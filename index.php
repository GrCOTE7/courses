<?php

declare(strict_types=1);

require_once './vendor/autoload.php';
require_once './tools/helpers.php';
require_once './tools/router.php';
require_once './config/settings.php';

$loader = new \Twig\Loader\FilesystemLoader('views');
$twig   = new \Twig\Environment($loader, [
    'cache' => APP['twigCache'],
    'debug' => APP['twigDebug'],
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$match = (myRouter($twig))->match();

if (is_array($match) && is_callable($match['target'])) {
    [$template, $data] = call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    echo 'ERROR - Index env. ligne 71';
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    exit;
}

echo $template->render(['data'  => $data ?? null]);