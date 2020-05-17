<?php
namespace App\repositories;

use App\entities\Product;

class ProductRepository extends Repository
{
   protected function getTableName()
    {
        return 'products';
    }

    protected function getEntityName()
    {
        return Product::class;
    }
}
