<?php

namespace Rumon\Database;

use \PDO;
use \PDOException;

require_once "Database.php";

class patrimonio{
    private $patri_id;
    private $patri_nome;
    private $patri_descricao;
    private $patri_valor;
    private $patri_multa;

    public function __construct()
    {
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }

    public function setId($value){
        $this->patri_id = $value;
    }

    public function setNome($value){
        $this->patri_nome = $value;
    }

    public function setDescricao($value){
        $this->patri_descricao = $value;
    }

    public function setValor($value){
        $this->patri_valor = $value;
    }

    public function setMulta($value){
        $this->patri_multa = $value;
    }

    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `patrimonio`(`patri_nome`,`patri_descricao`,`patri_valor`, `patri_multa`) VALUES(:patri_nome, :patri_descricao, :patri_valor, :patri_multa)");
            $stmt->bindParam(":patri_nome", $this->patri_nome);
            $stmt->bindParam(":patri_descricao", $this->patri_descricao);
            $stmt->bindParam(":patri_valor", $this->patri_valor);
            $stmt->bindParam(":patri_multa", $this->patri_multa);
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

    public function delete($patri_id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `patrimonio`  WHERE `patri_id` = :patri_id");
            $stmt->bindParam(":patri_id", $patri_id);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }

    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `patrimonio`  WHERE `patri_id` = :patri_id");
        $stmt->bindParam(":patri_id", $this->patri_id);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `patrimonio` WHERE 1");
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
