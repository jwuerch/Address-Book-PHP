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
      print_r($_SESSION['all_contacts']);
      return $app['twig']->render('home.html.twig', array('all_contacts' => $_SESSION['all_contacts']));
    });

    $app->post("/new_contact", function() use ($app) {
      $my_contact = new Contact($_POST['name'], $_POST['phone'], $_POST['address']);
      $my_contact->save();
      return $app['twig']->render('new_contact.html.twig', array('new_contact' => $my_contact));
    });

    $app->post("/delete_all", function() use ($app) {
      $_SESSION['all_contacts'] = array();
      return $app['twig']->render('delete_all.html.twig');
    });

    return $app;





 ?>
