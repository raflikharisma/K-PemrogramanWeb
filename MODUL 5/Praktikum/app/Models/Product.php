<?php

namespace app\Models;

// include "app/Config/DatabaseConfiguration.php";

include "/xampp/htdocs/praktikum/app/Config/DatabaseConfiguration.php";

use app\Config\DatabaseConfiguration;
use mysqli;

class Product extends DatabaseConfiguration
{
    public $conn;
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
        if ($this->conn->connect_error) {
            die("Connection Failed: " . $this->conn->connect_error);
        }
    }

    public function findAll()
    {
        $sql = "SELECT * FROM tb_singer INNER JOIN tb_detail ON tb_detail.code = tb_singer.code";
        $result = $this->conn->query($sql);
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    
    public function findDetail()
    {
        $sql = "SELECT * FROM tb_detail";
        $result = $this->conn->query($sql);
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function findByName($name)
    {
        $sql = "SELECT * FROM tb_singer 
        INNER JOIN tb_detail ON tb_detail.code = tb_singer.code 
        WHERE name = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM tb_singer 
        INNER JOIN tb_detail ON tb_detail.code = tb_singer.code 
        WHERE singer_id = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }


    public function create($data)
    {
        $name = $data['name'];
        $code = $data['code'];
        $company = $data['company'];

        $query = "INSERT INTO tb_singer (name, code ,company) VALUES (?, ?, ?)";
        $stmtSinger = $this->conn->prepare($query);
        $stmtSinger->bind_param("sss", $name, $code, $company);
        $stmtSinger->execute();
        $this->conn->close();
    }
    public function createDetail($data)
    {
        $code = $data['code'];
        $salary = $data['salary'];
        $genre = $data['genre'];

        $query = "INSERT INTO tb_detail (code, salary ,genre) VALUES (?, ?, ?)";
        $stmtSinger = $this->conn->prepare($query);
        $stmtSinger->bind_param("sis", $code, $salary, $genre);
        $stmtSinger->execute();
        $this->conn->close();
    }

    public function update($data, $name)
    {


        $code = $data['code'];
        $company = $data['company'];

        $sql = "UPDATE tb_singer SET code = ?, company = ? WHERE name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $code, $company, $name);
        $stmt->execute();
        $this->conn->close();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_singer WHERE singer_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
    }
}
