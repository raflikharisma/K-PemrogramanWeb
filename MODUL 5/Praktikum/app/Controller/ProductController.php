<?php

namespace app\Controller;

// include "app/Traits/ApiResponseFormatter.php";
// include "app/Models/Product.php";

include "/xampp/htdocs/praktikum/app/Models/Product.php";
include "/xampp/htdocs/praktikum/app/Traits/ApiResponseFormatter.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController
{
    use ApiResponseFormatter;
    public function index()
    {
        $productModel = new Product();
        $response = $productModel->findAll();
        return $this->apiResponse(200, "success", $response);
    }
    
    public function Detail()
    {
        $productModel = new Product();
        $response = $productModel->findDetail();
        return $this->apiResponse(200, "success", $response);
    }

    public function getByName($id)
    {
        $productModel = new Product();
        $response = $productModel->findByName($id);
        return $this->apiResponse(200, "success", $response);
    }
    public function getById($id)
    {
        $productModel = new Product();
        $response = $productModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        $jsonInput = file_get_contents("php://input");
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        $productModel = new Product();
        $response = $productModel->create([
            "name" => $inputData["name"],
            "code" => $inputData["code"],
            "company" => $inputData["company"],
        ]);
        return $this->apiResponse(200, "success", $response);
    }

    public function insertDetail()
    {
        $jsonInput = file_get_contents("php://input");
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        $productModel = new Product();
        $response = $productModel->createDetail([
            "code" => $inputData["code"],
            "salary" => $inputData["salary"],
            "genre" => $inputData["genre"],
        ]);
        return $this->apiResponse(200, "success", $response);
    }

    public function update($name)
    {
        $jsonInput = file_get_contents("php://input");
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        $productModel = new Product();
        $response = $productModel->update([
            "code" => $inputData["code"],
            "company" => $inputData["company"],
        ], $name);
        return $this->apiResponse(200, "success", $response);
    }
    public function delete($id)
    {
        $productModel = new Product();
        $response = $productModel->delete($id);
        return $this->apiResponse(200, "success", $response);
    }
}
