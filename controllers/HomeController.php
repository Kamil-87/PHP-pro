<?php


namespace App\controllers;


class HomeController extends Controller
{
    protected $defaultAction = 'home';

    public function homeAction() {
        return $this->render(
            'home',
            [
                'title' => $this->app->getConfig('title'),
                'menu' => $this->getMenu(),
            ]
        );
    }
}
