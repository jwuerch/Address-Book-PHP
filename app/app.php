<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/contact.php";

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

    $app->post("/new_contact", function() use ($app) {
      $my_contact = new Contact($_POST['name'], $_POST['phone'], $_POST['address']);
      $my_contact->save();
      return $app['twig']->render('new_contact.html.twig', array('contact' => $my_contact));
    });

    return $app;





 ?>
