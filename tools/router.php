<?php

function router($page, $twig) {
  require './controllers/'.$page.'Controller.php';
  // $template = $twig->load('./controllers/dbController.php');
  $template = $twig->load('pages/'.$page.'View.twig');
  return [$template, $data];
}