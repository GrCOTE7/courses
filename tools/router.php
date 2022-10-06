<?php

function myRouter($twig)
{
    $router = new AltoRouter();

    aff(getUri());
    
    $uri = (explode('/', getUri())[1]);
    [$uri, $page]= (!$uri) ? ['/', 'home'] : ['/'.$uri, $uri];

    aff($uri);
    aff($page);

    $router->map(
        'GET',
        $uri,
        function () use ($page, $twig) {
            require './controllers/'.$page.'Controller.php';
            // $template = $twig->load('./controllers/dbController.php');
            $template = $twig->load('pages/'.$page.'View.twig');
            aff($template);
            return [$template, $data];
        },
        $uri
    );

    return $router;
}