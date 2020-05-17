<?php


namespace App\controllers;


use App\entities\Product;

class AdminController extends Controller
{
    protected $defaultAction = 'admin';

    public function adminAction()
    {
        return $this->render(
            'adminPanel',
            [
                'title' => $this->app->getConfig('title'),
                'menu' => $this->getMenu(),
            ]
        );
    }




}
