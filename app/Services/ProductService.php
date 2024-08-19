<?php

namespace App\Services;

use App\Models\Product;
use GuzzleHttp\Client;

class ProductService
{
    /** @throws \Exception */

    public function getIphoneProducts()
    {
        $client = new Client();
        $response = $client->get('https://dummyjson.com/products/search?q=iphone');
        $products = json_decode($response->getBody(), true)['products'];
        return $products;
    }

    public function storeIphoneProducts(string $query)
    {
        $client = new Client();
        $response = $client->get('https://dummyjson.com/products/search?q=' . $query);
        $products = json_decode($response->getBody(), true)['products'];

        $savedProducts = [];
        foreach ($products as $product) {
            $savedProduct = Product::query()->create([
                'title' => $product['title'],
                'description' => $product['description'],
                'price' => $product['price'],
                'brand' => $product['brand'],
                'category' => $product['category'],
                'thumbnail' => $product['thumbnail'],
            ]);
            $savedProducts[] = $savedProduct;
        }

        return $savedProducts;
    }
}
