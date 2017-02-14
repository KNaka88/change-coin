<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Change.php";

    $app = new Silex\Application();

    session_start();
    if (empty($_SESSION['list_of_coins'])) {
        $_SESSION["list_of_coins"] = array();
    };

    $app->register(new Silex\Provider\TwigServiceProvider(), array (
    "twig.path" => __DIR__."/../views"
    ));

    $app['debug'] = true;

    $app->get("/", function() use($app) {
        return $app["twig"]->render("change_form.html.twig", array('money' => $_SESSION['list_of_coins']));
    });

    $app->post("/see_change", function() use($app) {
        $bills = $_POST['bills'];
        $coins = $_POST['coins'];
        $new_change = new Change;
        $new_change->setBills($bills);
        $new_change->makeChange($coins);
        $new_change->save();

        return $app["twig"]->render("change_form.html.twig", array('money' => $new_change));
    });
    return $app;
