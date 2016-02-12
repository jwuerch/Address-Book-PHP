<?php
    require_once __DIR__."/../vendor/autoload.php";

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
      'twig.path' => __DIR__.'/../views'
    ));

    session_start();
    if(empty($_SESSION['all_contacts'])) {
      $_SESSION['all_contacts'] = array();
    }


    $app->get("/", function() use ($app) {
      return $app['twig']->render('home.html.twig');
    });

    return $app;





 ?>
