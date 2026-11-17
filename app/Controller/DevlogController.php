<?php

namespace App\Controller;

use App\Core\{View,Response};

class DevlogController
{
    private View $view;

    public function __construct(View $view){
        $this->view = $view;
    }
    public function devlogForm(): Response
    {
        return $this->view->render('Devlog');
    }
}