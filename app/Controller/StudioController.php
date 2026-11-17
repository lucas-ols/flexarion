<?php

namespace App\Controller;

use App\Core\{View,Response};

class StudioController
{
    private View $view;

    public function __construct(View $view){
        $this->view = $view;
    }
    public function studioForm(): Response
    {
        return $this->view->render('Studio');
    }
}