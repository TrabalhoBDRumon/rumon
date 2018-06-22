<?php

namespace Rumon\Database;

use \PDO;
use \PDOException;

require_once "Database.php";

class Republica{
    private $r_id;
    private $r_nome;
    private $r_site;
    private $r_fundacao;
    private $r_email;
    private $r_tipo;
    private $r_facebook;
    private $r_telefone;


    public function __construct()
    {
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }

    public function setId($value){
        $this->r_id = $value;
    }

    public function setNome($value){
        $this->r_nome = $value;
    }

    public function setSite($value){
        $this->r_site = $value;
    }

    public function setFundacao($value){
        $this->r_fundacao = $value;
    }

    public function setEmail($value){
        $this->r_email = $value;
    }

    public function setTipo($value){
        $this->r_tipo = $value;
    }

    public function setFacebook($value){
        $this->r_facebook = $value;
    }

    public function setTelefone($value){
            $this->r_telefone = $value;
        }

    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `republica`(`r_nome`,`r_site`,`r_fundacao`,`r_email`,`r_tipo`, `r_facebook`, `r_telefone`) VALUES(:r_nome, :r_site, :r_fundacao, :r_email, :r_tipo, :r_facebook, :r_telefone");
            $stmt->bindParam(":r_nome", $this->r_nome);
            $stmt->bindParam(":r_site", $this->r_site);
            $stmt->bindParam(":r_fundacao", $this->r_fundacao);
            $stmt->bindParam(":r_email", $this->r_email);
            $stmt->bindParam(":r_tipo", $this->r_tipo);
            $stmt->bindParam(":r_facebook", $this->r_facebook);
            $stmt->bindParam(":r_telefone", $this->r_telefone);
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

    public function delete($r_id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `republica`  WHERE `r_id` = :r_id");
            $stmt->bindParam(":r_id", $r_id);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }

    public function view(){
        $stmt = $this->conn->query("SELECT r_nome FROM republica");
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }


    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `republica` WHERE 1");
        $stmt->execute();
        return $stmt;
    }

    /*public function searchMocksByIdProfessors(){
        $stmt = $this->conn->prepare("SELECT m.* FROM `mocks` m JOIN subareas s ON m.idmocks = s.mocks_idmocks JOIN `areas` a ON s.areas_id = a.id JOIN matters ma ON a.id = ma.areaS_id JOIN professors p ON ma.id = p.matters_id AND ma.areaS_id = p.matters_areaS_id WHERE p.id = :id");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }*/
}
