<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Interfaces\IProductService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }


    public function index()
    {
       $products =  $this->productService->getAllProducts();
        return Inertia::render('Products/Index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store(ProductCreateRequest $request)
    {
        $request->validated();

        try {
            $productData = $request->all();
            $product = $this->productService->createProduct($productData);
            $this->productService->uploadProductImages($product['product_id'], $productData['images']);

            return to_route('products.index');
        } catch (\Exception $e) {
            return to_route('products.index');
        }
    }

    public function edit($product_id)
    {
        try {
            $product = $this->productService->getProductById($product_id);
            $product['images'] = $this->productService->getProductImages($product_id);

            $photo_directory = asset('img/products/');  

            return Inertia::render('Products/Edit', [
                'product' => $product,
                'photo_url' => $photo_directory
            ]);
        } catch (\Exception $e) {
            return to_route('products.index');
        }
    }

    public function update(ProductCreateRequest $request, $product_id)
    {

        try {
            $productData = $request->all();
            $this->productService->updateProduct($product_id, $productData);

            if (!empty($productData['images'])) {
                $this->productService->deleteProductImage($product_id);
                $this->productService->uploadProductImages($product_id, $productData['images']);
            }
             
            return to_route('products.index');
        } catch (\Exception $e) {
            return to_route('products.index');

        }
    }

    public function destroy($product_id)
    {
        try {
            $this->productService->deleteProduct($product_id);

            $this->productService->deleteProductImage($product_id);

            return to_route('products.index');
        } catch (\Exception $e) {
            return to_route('products.index');
        }
    }
}
