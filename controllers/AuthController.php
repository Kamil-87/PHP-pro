<?php


namespace App\controllers;


use App\entities\User;
use App\repositories\UserRepository;

class AuthController extends Controller
{
    protected $defaultAction = 'auth';

    public function loginAction()
    {
        var_dump($_POST);

        $request = $this->app->request;


        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $request->redirectApp('Что-то пошло не так');
            return '';
        }

        if (empty($_POST['login']) || empty($_POST['password'])) {
            $request->redirectApp('Не все данные переданы');
            return '';
        }
    }

            public function isAuth()
            {
                $login = ($_POST['login']);
                $password = $_POST['password'];


                if (password_verify($password, $row['user_password'])) {
                    $_SESSION[AUTH] = true;
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['user_id'] = $row['id_user'];
                    $_SESSION['user_login'] = $row['user_login'];
                    $_SESSION['user_name'] = $row['user_name'];
                }
            }

            public function isAdmin()
            {

            }


            public function authAction()
            {
                $request = $this->app->request;


        /*

               if (password_verify($password, $row['user_password'])) {
                    $_SESSION[AUTH] = true;
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['user_id'] = $row['id_user'];
                    $_SESSION['user_login'] = $row['user_login'];
                    $_SESSION['user_name'] = $row['user_name'];
                }

                $this->getRepository('Product')->save($user);
                header('Location: /product/all' );*/

        return $this->render(
            'auth',
            [
                'title' => $this->app->getConfig('title'),
                'menu' => $this->getMenu(),
            ]
        );
    }

    public function signUpAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = new User();
            $user->user_name = $_POST['name'];
            $user->user_login = $_POST['login'];
            $user->user_password = $_POST['password'];
            $user->user_password = password_hash(" $user->user_password", PASSWORD_DEFAULT);


            $this->getRepository('User')->save($user);
            header('Location: /auth');
            return '';
        }

        return $this->render(
            'signUp',
            [
                'title' => $this->app->getConfig('title'),
                'menu' => $this->getMenu(),
            ]
        );

    }

    function logoutAction()
    {
        session_destroy();
        header('Location: /auth');
    }
}
