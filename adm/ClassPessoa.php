<?php

namespace Rumon\Database;

use \PDO;
use \PDOException;

require_once "Database.php";

class Pessoa{
    private $p_id;
    private $p_cpf;
    private $p_rg;
    private $p_nome;
    private $p_tipo;
    private $p_carteirinha;
    private $p_nascimento;
    private $p_celular;
    private $p_apelido;
    private $p_faculdade;
    private $rep_id;

    public function __construct()
    {
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }

    public function setId($value){
        $this->p_id = $value;
        return 1;
    }
    public function setCpf($value){
        $this->p_cpf = $value;
    }
    public function setRg($value){
        $this->p_rg = $value;
    }

    public function setNome($value){
        $this->p_nome = $value;
    }

    public function setTipo($value){
        $this->p_tipo = $value;
    }

    public function setCarteirinha($value){
        $this->p_carteirinha = $value;
    }

    public function setNasc($value){
        $this->p_nascimento = $value;
    }
    public function setCelular($value){
        $this->p_celular = $value;
    }
    public function setApelido($value){
        $this->p_apelido = $value;
    }
    public function setFaculdade($value){
        $this->p_faculdade = $value;
    }
    public function setRepID($value){
        $this->rep_id = $value;
    }

    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `pessoa`(`p_cpf`,`p_rg`,`p_nome`,`p_tipo`,`p_carteirinha`, `p_nascimento`,`p_celular`,`p_apelido`,`p_faculdade`,`rep_id`) VALUES(:p_cpf, :p_rg, :p_nome, :p_tipo,:p_carteirinha,:p_nascimento,:p_celular,:p_apelido,:p_faculdade,:rep_id)");
            $stmt->bindParam(":p_cpf", $this->p_cpf);
            $stmt->bindParam(":p_rg", $this->p_rg);
            $stmt->bindParam(":p_nome", $this->p_nome);
            $stmt->bindParam(":p_tipo", $this->p_tipo);
            $stmt->bindParam(":p_carteirinha", $this->p_carteirinha);
            $stmt->bindParam(":p_nascimento", $this->p_nascimento);
            $stmt->bindParam(":p_celular", $this->p_celular);
            $stmt->bindParam(":p_apelido", $this->p_apelido);
            $stmt->bindParam(":p_faculdade", $this->p_faculdade);
            $stmt->bindParam(":rep_id", $this->rep_id, PDO::PARAM_INT);
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

    public function delete($p_id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `pessoa`  WHERE `p_id` = :p_id");
            $stmt->bindParam(":p_id", $p_id);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }

    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `pessoa`  WHERE `p_id` = :p_id");
        $stmt->bindParam(":p_id", $this->p_id);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    public function buscaPessoa($apelido){
        $stmt = $this->conn->query("SELECT p_nome, p_apelido, p_celular FROM pessoa WHERE p_apelido = '".$apelido."'");
        //$stmt->bindParam(":p_apelido", $apelido);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    public function moraRepublica($republica){
        $stmt = $this->conn->query("SELECT p_nome, p_apelido, p_celular FROM pessoa WHERE rep_id = '".$republica."'");
        $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }

    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `pessoa` WHERE 1");
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

  ?>