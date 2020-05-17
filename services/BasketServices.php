<?php

namespace App\services;

use App\entities\Product;
use App\repositories\ProductRepository;

class BasketServices
{
    public function add(Request $request, ProductRepository $productRepository )
    {
        $id = $request->getId();
        if (empty($id)) {
            return false;
        }

        /** @var Product $product */
        $product = $productRepository->getOne($id);
        if (empty($product)) {
            return false;
        }

        $products = $request->getSession('products');

        if (empty($products[$id])) {
            $products[$id] = [
                'product' => $product,
                'count' => 1
            ];
        } else {
            $products[$id]['count']++;
        }

        $request->setSession('products', $products);

        return true;
    }

    public function del(Request $request, ProductRepository $productRepository )
    {
        $id = $request->getId();
        if (empty($id)) {
            return false;
        }

        $products = $request->getSession('products');

        if (!empty($products[$id])) {
            $products[$id]['count']--;
            if ($products[$id]['count'] === 0) {
                unset($products[$id]);
            }
        }

        $request->setSession('products', $products);

        return true;
    }

    public function delFromBasket(Request $request, ProductRepository $productRepository )
    {
        $id = $request->getId();
        if (empty($id)) {
            return false;
        }

        $products = $request->getSession('products');
        unset($products[$id]);
        $request->setSession('products', $products);

        return true;
    }

    public function getTotalProductPrice($price, $count)
    {
        return $price * $count;
    }
}
