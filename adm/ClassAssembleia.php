<?php

namespace Rumon\Database;

use \PDO;
use \PDOException;

require_once "Database.php";

class Assembleia{
    private $assembleia_id;
    private $assembleia_data;


    public function __construct()
    {
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }

    public function setId($value){
        $this->assembleia_id = $value;
    }
    public function setData($value){
        $this->assembleia_data = $value;
    }

    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `assembleia`(`assembleia_data`) VALUES(:assembleia_data)");
            $stmt->bindParam(":assembleia_data", $this->assembleia_data);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }
    }

    /*public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `professors` SET `name` = :name, `matter` = :matter, `cpf` = :cpf, `phone` = :phone WHERE `id` = :id AND `users_id` = :users_id");
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":matter", $this->matter);
            $stmt->bindParam(":cpf", $this->cpf);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":users_id", $this->users_id);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }*/

    public function delete($assembleia_id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `assembleia`  WHERE `assembleia_id` = :assembleia_id");
            $stmt->bindParam(":assembleia_id", $assembleia_id);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }

    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `assembleia`  WHERE `assembleia_id` = :assembleia_id");
        $stmt->bindParam(":assembleia_id", $this->assembleia_id);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function mostraAssembleias(){
        $stmt = $this->conn->query("SELECT * FROM assembleia WHERE 1");
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `assembleia` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
  }

    /*public function searchMocksByIdProfessors(){
        $stmt = $this->conn->prepare("SELECT m.* FROM `mocks` m JOIN subareas s ON m.idmocks = s.mocks_idmocks JOIN `areas` a ON s.areas_id = a.id JOIN matters ma ON a.id = ma.areaS_id JOIN professors p ON ma.id = p.matters_id AND ma.areaS_id = p.matters_areaS_id WHERE p.id = :id");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }
}*/
