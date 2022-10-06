<?php

require_once './vendor/autoload.php';
require_once './tools/functions.php';
require_once './config/settings.php';

$loader = new \Twig\Loader\FilesystemLoader('views');
$twig   = new \Twig\Environment($loader, [
    'cache' => APP['twigCache'],
    'debug' => APP['twigDebug'],
]);
// $twig->addGlobal('session', $_SESSION ?? null);
$twig->addExtension(new \Twig\Extension\DebugExtension());


$router = new AltoRouter();
// $router->setBasePath('/');

$router->map(
    'GET',
    '/',
    function () {
        require __DIR__.'/controllers/homeController.php';
        return $data;
    },
    'home'
);

$router->map(
    'GET',
    '/user',
    function () {
        require __DIR__.'/controllers/userController.php';
        return $data;
    },
    'user'
);

$router->map(
    'GET',
    '/users',
    function () {
        require __DIR__.'/controllers/usersController.php';
        return $data;
    },
    'users'
);

$router->map(
    'GET',
    '/db',
    function () {
        require __DIR__.'/controllers/dbController.php';
        return $data;
    },
    'db'
);
// '/courses/user/[i:id]',

$match = $router->match();

// aff($router);

// aff($match);

    if (is_array($match) && is_callable($match['target'])) {
        $data = call_user_func_array($match['target'], $match['params']);
    // aff($data);
    } else {
        // no route was matched
        echo 'ERROR - Index env. ligne 71';
        // header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }

    // require_once controllers($page);
    $template = $twig->load('pages/' . $data['page'] . 'View.twig');

    // aff($router);

    echo $template->render(['data'  => $data ?? null]);