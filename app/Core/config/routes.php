<?php

use App\Controller\{HomeController,
    StudioController,
    ContactController,
    DevlogController,
    GameController};

return [
    ['GET', '/', [HomeController::class, 'homeForm']],
    ['GET', '/studio', [StudioController::class, 'studioForm']],
    ['GET', '/contact', [ContactController::class, 'contactForm']],
    ['GET', '/devlog', [DevlogController::class, 'devlogForm']],
    ['GET', '/game', [GameController::class, 'gameForm']],
];
