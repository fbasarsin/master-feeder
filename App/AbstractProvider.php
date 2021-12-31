<?php
namespace App;

use App\Classes\Product;
use App\Provider\Facebook;
use App\Provider\Google;

abstract class AbstractProvider
{
    protected const FORMAT = '';
    protected const ITEM = '';

    /**
     * @var Product[] $products
     */
    protected array $products;

    /**
     * @throws ProviderException
     * @throws Classes\ProductException
     */
    public function __construct()
    {
        if (!static::FORMAT || !static::ITEM){
            throw new ProviderException("FORMAT, ITEM and Type can not be empty");
        }

        $file = file_get_contents('./products.json');

        $products = json_decode($file,true);

        foreach ($products as $product) {
            $this->products[] = new Product($product);
        }
    }

    /**
     * @throws ProviderException
     */
    public static function create(string $name):AbstractProvider
    {
        return match(strtolower($name)){
          'facebook' => new Facebook(),
            'google' => new Google(),
            default => throw new ProviderException("Provider $name is not defined.")
        };
    }

    abstract protected function createItem(Product $product) :string;

    abstract protected function createList(string $list) :string;

    public function getList(): ?string
    {
        $list = '';
        foreach ($this->products as $product){
            $list .= $this->createItem($product);
        }

        return $this->createList($list);
    }
}