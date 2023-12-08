<?php

namespace app\Routes;

// include "app/Controller/ProductController.php";

include "/xampp/htdocs/praktikum/app/Controller/ProductController.php";

use app\Controller\ProductController;

class ProductRoutes
{
    public function handle($method, $path)
    {
        if ($method == "GET" && $path == "/api/allsinger") {
            $controllerr = new ProductController();
            echo $controllerr->index();
        }
        if ($method == "GET" && $path == "/detail") {
            $controller = new ProductController();
            echo $controller->Detail();
        }

        // if ($method == "GET" && strpos($path, "/api/singer/name/") == 0) {
        //     $pathParts = explode("/", $path);
        //     $name = $pathParts[count($pathParts) - 1];

        //     $controller = new ProductController();
        //     echo $controller->getByName($name);
        // }
        // if ($method == "GET" && strpos($path, "/api/singer/") == 0) {
        //     $pathParts = explode("/", $path);
        //     $id = $pathParts[count($pathParts) - 1];

        //     $controller = new ProductController();
        //     echo $controller->getById($id);
        // }

        if ($method == "POST" && $path == "/api/singer") {
            $controller = new ProductController();
            echo $controller->insert();
        }
        if ($method == "POST" && $path == "/api/detail") {
            $controller = new ProductController();
            echo $controller->insertDetail();
        }

        if ($method == "PUT" && strpos($path, "/api/singer/") == 0) {
            $pathParts = explode("/", $path);
            $name = $pathParts[count($pathParts) - 1];

            $controller = new ProductController();
            echo $controller->update($name);
        }
        if ($method == "DELETE" && strpos($path, "/api/singer/") == 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new ProductController();
            echo $controller->delete($id);
        }
    }
}
