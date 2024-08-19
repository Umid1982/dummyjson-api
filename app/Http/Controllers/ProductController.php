<?php

namespace App\Http\Controllers;

use App\Console\Constants\ProductResponseEnum\ProductResponseEnum;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(protected readonly ProductService $productService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->productService->getIphoneProducts();
        return response([
            'data' => ProductResource::collection($data),
            'message' => ProductResponseEnum::PRODUCT_LIST,
            'success' => true
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $data = $this->productService->storeIphoneProducts('iphone');

        return response([
            'data' => ProductResource::collection($data),
            'message' => ProductResponseEnum::PRODUCT_CREATE,
            'success' => true
        ]);
    }

}
