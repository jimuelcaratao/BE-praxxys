<?php

namespace App\Services;

use App\Interfaces\IProductService;
use App\Models\Product;
use App\Models\ProductImage;

class ProductService implements IProductService
{
    public function getAllProducts()
    {
        $products = Product::paginate(5);

        return $products;
    }

    public function getProductById($product_id)
    {
        $product = Product::find($product_id);

        return $product;
    }

    public function getProductImages($product_id)
    {
        $productImages = ProductImage::where('product_id', $product_id)->get();

        return $productImages;
    }

    public function createProduct($productData)
    {
        $product = new Product();
        $product->name = $productData['name'];
        $product->description = $productData['description'];
        $product->price = $productData['price'];
        $product->manual_date = $productData['manual_date'];
        $product->manual_time = $productData['manual_time'];
        $product->save();

        return $product;
    }

    public function updateProduct($product_id, $productData)
    {
        $product = Product::find($product_id);
        $product->name = $productData['name'];
        $product->description = $productData['description'];
        $product->price = $productData['price'];
        $product->manual_date = $productData['manual_date'];
        $product->manual_time = $productData['manual_time'];
        $product->save();

        return $product;
    }

    public function deleteProduct($product_id)
    {
        $product = Product::find($product_id);

        if (!$product) {
            return null;
        }

        $product->delete();
        
        return $product;
    }
    public function uploadProductImages($product_id, $images)
    {
        $product = Product::find($product_id);

        if (!$product) {
            return null;
        }

        $imageNames = [];
        foreach ($images as $image) {
            $imageName = $product_id . '_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/products'), $imageName);
            $imageNames[] = $imageName;

            $productImage = new ProductImage();
            $productImage->product_id = $product_id;
            $productImage->directory = $imageName;
            $productImage->save();
        }

        return $product;
    }

    public function deleteProductImage($product_image_id)
    {
        $productImage = ProductImage::find($product_image_id);

        if (!$productImage) {
            return null;
        }

        $productImage->delete();

        return $productImage;
    }
}