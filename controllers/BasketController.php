<?php

namespace App\controllers;

use App\entities\Product;
use App\repositories\ProductRepository;

class BasketController extends Controller
{
    protected $defaultAction = 'my';

    public function addAction()
    {
        $request = $this->app->request;

        /**@var ProductRepository $productRepository*/
        $productRepository = $this->getRepository('Product');
        $hasAdd = $this->app->basketServices->add($request, $productRepository);

        if (!$hasAdd) {
            return $this->render('404');
        }

        $request->redirectApp('Товар добавлен в корзину');
        return '';
    }

    public function delAction()
    {
        $request = $this->app->request;

        /**@var ProductRepository $productRepository*/
        $productRepository = $this->getRepository('Product');
        $hasAdd = $this->app->basketServices->del($request, $productRepository);

        if (!$hasAdd) {
            return $this->render('404');
        }

        $request->redirectApp('Вы уменьшили количество товара');
        return '';
    }

    public function delFromBasketAction()
    {
        $request = $this->app->request;

        /**@var ProductRepository $productRepository*/
        $productRepository = $this->getRepository('Product');
        $hasAdd = $this->app->basketServices->delFromBasket($request, $productRepository);

        if (!$hasAdd) {
            return $this->render('404');
        }

        $request->redirectApp('Товар удален из корзины');
        return '';
    }

    public function getTotalProductPriceAction()
    {

    }

    public function myAction()
    {

        return $this->render(

            'basket',
            [
                'title' => $this->app->getConfig('title'),
                'menu' => $this->getMenu(),
                'session' => $_SESSION,
            ]
        );

    }
}
