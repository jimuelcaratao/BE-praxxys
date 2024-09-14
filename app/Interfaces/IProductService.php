<?php

namespace App\Interfaces;

interface IProductService
{
    public function getAllProducts();
    public function getProductById($product_id);
    public function getProductImages($product_id);
    public function createProduct($productData);
    public function updateProduct($product_id, $productData);
    public function deleteProduct($product_id);
    public function uploadProductImages($product_id, $images);
    public function deleteProductImage($product_image_id);
}