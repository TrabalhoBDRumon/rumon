<?php

namespace Rumon\Database;

use \PDO;
use \PDOException;

require_once "Database.php";

class frequenta{
    private $republica_id;
    public $id_assembleia;


    public function __construct()
    {
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }

    public function setId($value){
        $this->republica_id = $value;
    }
    public function setIdAssembleia($value){
        $this->id_assembleia = $value;
    }

    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `frequenta`(`republica_id`,`id_assembleia`) VALUES(:republica_id, :id_assembleia)");
            $stmt->bindParam(":republica_id", $this->republica_id);
            $stmt->bindParam(":id_assembleia", $this->id_assembleia);

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

    public function delete($republica_id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `frequenta`  WHERE `republica_id` = :republica_id");
            $stmt->bindParam(":republica_id", $republica_id);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }

    public function view($idassemb){
        $stmt = $this->conn->query("SELECT * FROM `frequenta`  WHERE `id_assembleia` = '".$idassemb."'");
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $row;
    }

    //public function view(){
    //    $stmt = $this->conn->query("SELECT * FROM assembleia  WHERE assembleia_id = '".$this->assembleia_id."'");
    //    $row = $stmt->fetchAll(PDO::FETCH_OBJ);
    //    return $row;
    //}
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `frequenta` WHERE 1");
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
