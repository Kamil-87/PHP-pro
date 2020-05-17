<?php

namespace App\controllers;

use App\core\App;
use App\services\renderers\IRenderer;
use App\services\renderers\TwigRenderer;

abstract class Controller
{
    protected $defaultAction = 'all';

    /**
     * @var TwigRenderer
     */
    protected $renderer;

    /**
     * @var App
     */
    protected $app;

    public function __construct(IRenderer $renderer, App $app)
    {
        $this->renderer = $renderer;
        $this->app = $app;
    }

    public function run($actionName)
    {
        $action = $this->defaultAction;
        if (!empty($actionName)) {
            $action = $actionName;
            if (!method_exists($this, $action . 'Action')) {
                return $this->render('404');
            }
        }
        $action .= 'Action';
        return $this->$action();
    }

    protected function render($template, $params = [])
    {
        return $this->renderer->render($template, $params);
    }

    protected function getMenu()
    {
        return [
            [
                'name' => 'Главная',
                'href' => '/',
            ],
            [
                'name' => 'Каталог',
                'href' => '/product/all',
            ],
            [
                'name' => 'Корзина',
                'href' => '/basket',
            ],
            [
                'name' => 'Авторизация',
                'href' => '/auth',
            ],
            [
                'name' => 'Личный кабинет',
                'href' => '/account',
            ],
            [
                'name' => 'Админ панель',
                'href' => '/admin',
            ],
            [
                'name' => 'Отзывы',
                'href' => '/feedback/all',
            ],

        ];
    }

    /**
     * @param $repositoryName
     * @return \App\repositories\Repository|null
     */
    protected function getRepository($repositoryName)
    {
        return $this->app->db->getRepository($repositoryName);
    }
}
