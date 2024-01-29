<?php
namespace App\Services;
use App\Models\Product;

class ProductToolService
{
    public function getRequiredTools(Product $product)
    {
        // Retrieve the required tools for the given product
        return $product->tools;
    }
}
