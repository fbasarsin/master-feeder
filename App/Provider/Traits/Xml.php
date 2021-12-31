<?php
namespace App\Provider\Traits;

use App\Classes\Product;

trait Xml
{
    protected function createItem(Product $product): string
    {
        return str_replace(
            ['{Id}', '{Name}', '{Price}', '{Category}'],
            [$product->getId(), $product->getName(), $product->getPrice(), $product->getCategory()],
            static::ITEM
        );
    }

    protected function createList($list): string
    {
        return str_replace(
            ['{list}'],
            [$list],
            static::FORMAT
        );
    }
}