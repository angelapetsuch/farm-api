<?php
namespace App\Services;
use App\Models\Personnel;

class PersonnelProductService
{
    public function getProduct(Personnel $personnel)
    {
        // Retrieve the personnel in charge of the given product
        return $personnel->product;
    }
}
