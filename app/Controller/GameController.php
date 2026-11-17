<?php

namespace App\Controller;

use App\Core\{View,Response};

class GameController
{
    private View $view;

    public function __construct(View $view){
        $this->view = $view;
    }
    public function gameForm(): Response
    {
        return $this->view->render('Game');
    }

}