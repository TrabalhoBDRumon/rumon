<?php

namespace Rumon\Database;

use \PDO;
use \PDOException;

require_once "Database.php";

class aluga{
    private $aluga_id;
    private $data_emprestimo;
    private $data_devolucao;
    private $situacao;
    private $id_rep_alugou;
    private $id_patri_alugou;

    public function __construct()
    {
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }

    public function setId($value){
        $this->aluga_id = $value;
    }
    public function setDataEmprestimo($value){
        $this->data_emprestimo = $value;
    }
    public function setDataDevolucao($value){
        $this->data_devolucao = $value;
    }
    public function setSituacao($value){
        $this->situacao = $value;
    }
    public function setIdRepAlugou($value){
        $this->id_rep_alugou = $value;
    }
    public function setIdPatriAlugou($value){
        $this->id_patri_alugou = $value;
    }

    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `aluga`(`aluga_id`,`data_emprestimo`,`data_devolucao`,`situacao`,`id_rep_alugou`, `id_patri_alugou`) VALUES(:aluga_id, :data_emprestimo, :data_devolucao, :situacao,:id_rep_alugou,:id_patri_alugou)");
            $stmt->bindParam(":aluga_id", $this->aluga_id);
            $stmt->bindParam(":data_emprestimo", $this->data_emprestimo);
            $stmt->bindParam(":data_devolucao", $this->data_devolucao);
            $stmt->bindParam(":situacao", $this->situacao);
            $stmt->bindParam(":id_rep_alugou", $this->id_rep_alugou); //  precisa desse id aqui ?
            $stmt->bindParam(":id_patri_alugou", $this->id_patri_alugou); // precisa desse id aqui ?
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

    public function delete($aluga_id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `aluga`  WHERE `aluga_id` = :aluga_id");
            $stmt->bindParam(":aluga_id", $aluga_id);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }

    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `aluga`  WHERE `aluga_id` = :aluga_id");
        $stmt->bindParam(":aluga_id", $this->aluga_id);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `aluga` WHERE 1");
        $stmt->execute();
        return $stmt;
    }

    public function buscaAluguel($idpat){
        $stmt = $this->conn->query("SELECT * FROM aluga WHERE id_patri_alugou = '".$idpat."'");
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
  }

    /*public function searchMocksByIdProfessors(){
        $stmt = $this->conn->prepare("SELECT m.* FROM `mocks` m JOIN subareas s ON m.idmocks = s.mocks_idmocks JOIN `areas` a ON s.areas_id = a.id JOIN matters ma ON a.id = ma.areaS_id JOIN professors p ON ma.id = p.matters_id AND ma.areaS_id = p.matters_areaS_id WHERE p.id = :id");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }
}*/
