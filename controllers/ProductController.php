<?php

namespace App\controllers;


use App\entities\Product;
use App\repositories\ProductRepository;

class ProductController extends Controller
{
    public function oneAction()
    {
        $id = 0;
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
        }

        $product = $this->getRepository('Product')->getOne($id);

        return $this->render(
            'productOne',
            [
                'title' => $product->name,
                'menu' => $this->getMenu(),
                'product' => $product,
            ]
        );
    }

    public function allAction()
    {
        $products = $this->getRepository('Product')->getAll();
        return $this->render(
            'productAll',
            [
                'title' => $this->app->getConfig('title'),
                'menu' => $this->getMenu(),
                'products' => $products,
            ]
        );
    }

    public function insertAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = new Product();
            $product->image = $_POST['image'];
            $product->name = $_POST['name'];
            $product->price = $_POST['price'];
            $product->description = $_POST['description'];

            $this->getRepository('Product')->save($product);
            header('Location: /product/insert' );
            return '';
        }

        return $this->render(
            'productAdd',
            [
                'title' => $this->app->getConfig('title'),
                'menu' => $this->getMenu(),
            ]
        );
    }


}
