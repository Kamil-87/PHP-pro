<?php

namespace App\controllers;

use App\entities\User;
use App\repositories\UserRepository;

class UserController extends Controller
{
    public function oneAction()
    {
        $id = 0;
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
        }

        $user = $this->getRepository('User')->getOne($id);
        return $this->render(
            'userOne',
            [
                'title' => $user->name,
                'menu' => $this->getMenu(),
                'user' => $user
            ]
        );
    }

    public function allAction()
    {
        $users = $this->getRepository('User')->getAll();
        return $this->render(
            'userAll',
            [
                'title' => $this->app->getConfig('title'),
                'menu' => $this->getMenu(),
                'users' => $users,
            ]
        );
    }
}
