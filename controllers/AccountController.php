<?php


namespace App\controllers;


class AccountController extends Controller
{
    protected $defaultAction = 'account';

    public function accountAction()
    {
        return $this->render(
            'account',
            [
                'title' => $this->app->getConfig('title'),
                'menu' => $this->getMenu(),
            ]
        );
    }
}
