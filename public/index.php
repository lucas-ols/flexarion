<?php

use App\Core\{View,
    Env,
    Database,
    Router,
    Request};
use App\Controller\{HomeController,
};
use App\Model\UserRepository;


$root = __DIR__ . '/..';
require_once $root . '/vendor/autoload.php'; //AutoLoader de composer
require_once $root . '/app/Core/AutoLoader.php';

$env_path = $root. '/.env';
Env::load($env_path);
session_start();


$view = new View($root . '/views', ['loggedUser' => $_SESSION['user'] ?? null]);

$craft = [
    HomeController::class     => fn() => new HomeController($view),
];

$router = new Router(require $root . '/app/Core/config/routes.php', $view, $craft);

$router->dispatch(Request::fromGlobals())->send();

