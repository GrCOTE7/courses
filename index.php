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

$template = $twig->load('index.twig');

$data['test']='Juste pour voir passages de varaibles OK ;-) !<br>(\'Environ ligne 20 de l\'index général\'';

echo $template->render(
    [
        'title' => $title ?? null,
        'data'  => $data ?? null,
    ]
);