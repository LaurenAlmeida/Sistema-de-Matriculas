<?php

include_once "../model/Matricula.php";

include_once "ConexaoPDO.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MatriculaPDO
 *
 * @author laurengoncalves
 */
class MatriculaPDO {
   private $conn;
   
   public function __construct() {
       $this->conn= ConexaoPDO::getInstance();
   }
   
   public function insert($matricula){
       try {
       $stmt = $this->conn->prepare("INSERT INTO matriculas (id_matricula,data,formapagto,matricula,cod,codigo,situacao) VALUES (?,?,?,?,?,?,?)");
       $stmt->bindValue(1,$matricula->getId());
       $stmt->bindValue(2,$matricula->getData());
       $stmt->bindValue(3,$matricula->getFormaPagto());
       $stmt->bindValue(4,$matricula->getAlunos());
       $stmt->bindValue(5,$matricula->getTurmas());
       $stmt->bindValue(6,$matricula->getCursos());
       $stmt->bindValue(7,$matricula->getSituacao());
       if($stmt->execute()){
           return TRUE;
       }
       return FALSE;
       } catch (PDOException $ex) {
           echo $ex->getMessage();
           return FALSE;
       }
   }
   
   public function delete($matricula){
       try {
       $stmt = $this->conn->prepare("UPDATE matriculas SET situacao= ? WHERE id_matricula=? and codigo=?");
       $stmt->bindValue(1,$matricula->getSituacao());
       $stmt->bindValue(2,$matricula->getId());
       $stmt->bindValue(3,$matricula->getCursos());
       if($stmt->execute()){
           return TRUE;
       }
       } catch (PDOException $ex) {
           echo $ex->getMessage();
           return FALSE;
       }     
   }
    
   public function update($matricula){
       try {
       $stmt = $this->conn->prepare("UPDATE matriculas SET data=?,formapagto=? WHERE id_matricula=?");
       $stmt->bindValue(1,$matricula->getData());
       $stmt->bindValue(2,$matricula->getFormaPagto());
       $stmt->bindValue(3,$matricula->getId_matricula());
       if($stmt->execute()){
           return TRUE;
       }
       return FALSE;
       } catch (PDOException $ex) {
        echo $ex->getMessage();
        return FALSE;
       }
   }
   
    public function findAll(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM matriculas WHERE situacao=1 ORDER BY id_matricula");
            if($stmt->execute()){
                $matriculas = Array();
                while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($matriculas, $this->resultToMatricula($res));
                }
                return $matriculas;
            }
        else{
            echo "Não foi possível acessar o banco de dados.";
            return NULL;
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return NULL;
        }    
    }
    
    public function findById($id){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM matriculas WHERE id_matricula=?");
        $stmt->bindValue(1,$id, PDO::PARAM_INT);
        if($stmt->execute()){
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            return $this->resultToMatricula($res);
        }else{
            echo "Não foi possível acessar o banco de dados.";
            return NULL;
        }
            } catch (Exception $ex) {
            echo $ex->getMessage();
            return NULL;
        }
    }
    
    public function findByPagto ($formaPagto){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM matriculas WHERE formaPagto=? and situacao=1");
        $stmt->bindValue(1,$formaPagto);
        if($stmt->execute()){
            $matriculas = Array();
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($matriculas, $this->resultToMatricula($res));
            }
            return $matriculas;
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return NULL;
        }
    }
        
      public function findByCurso ($cursos){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM matriculas WHERE codigo=? and situacao=1");
        $stmt->bindValue(1,$cursos);
        if($stmt->execute()){
            $matriculas = Array();
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($matriculas, $this->resultToMatricula($res));
            }
            return $matriculas;
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return NULL;
        }
    }
        
      public function findByTurma ($turmas){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM matriculas WHERE cod=? and situacao=1");
        $stmt->bindValue(1,$turmas);
        if($stmt->execute()){
            $matriculas = Array();
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($matriculas, $this->resultToMatricula($res));
            }
            return $matriculas;
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return NULL;
        }
    }
        
     public function findCanceladas (){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM matriculas WHERE situacao=2");
        if($stmt->execute()){
            $matriculas = Array();
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($matriculas, $this->resultToMatricula($res));
            }
            return $matriculas;
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return NULL;
        }
    }
        
    
       private function resultToMatricula($res){
       $matricula = new Matricula();
       $matricula->setId_matricula($res->id_matricula);
       $matricula ->setData($res->data);
       $matricula ->setFormaPagto($res->formapagto);
       $matricula ->setAlunos($res->matricula);
       $matricula ->setTurmas($res->cod);
       $matricula ->setCursos($res->codigo);
       $matricula ->setSituacao($res->situacao);
       return $matricula ;
       
   }
        
    
}
