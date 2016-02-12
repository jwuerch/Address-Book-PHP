<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/contact.php";

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
      'twig.path' => __DIR__.'/../views'
    ));

    session_start();
    if(empty($_SESSION['list_of_contacts'])) {
      $_SESSION['list_of_contacts'] = array();
    }

    $app->get("/", function() use ($app) {
      return $app['twig']->render('home.html.twig', array('all_contacts' => Contact::getAll()));
    });

    $app->post("/create_contact", function() use ($app) {
      $my_contact = new Contact($_POST['name'], $_POST['phone'], $_POST['address']);
      $my_contact->save();
      return $app['twig']->render('create_contact.html.twig', array('new_contact' => $my_contact));
    });

    $app->post("/delete_contacts", function() use ($app) {
      $_SESSION['list_of_contacts'] = array();
      return $app['twig']->render('delete_contacts.html.twig');
    });

    return $app;





 ?>
