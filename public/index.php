<?php

use App\Core\{View,
    Env,
    Database,
    Router,
    Request};
use App\Controller\{HomeController,
    StudioController,
    ContactController,
    DevlogController,
    GameController
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
    StudioController::class => fn() => new StudioController($view),
    ContactController::class => fn() => new ContactController($view),
    DevlogController::class => fn() => new DevlogController($view),
    GameController::class => fn() => new GameController($view),
];

$router = new Router(require $root . '/app/Core/config/routes.php', $view, $craft);

$router->dispatch(Request::fromGlobals())->send();

