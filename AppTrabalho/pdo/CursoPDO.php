<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CursoPDO
 *
 * @author laurengoncalves
 */
class CursoPDO {
    private $conn;
    
    public function __construct() {
        $this->conn = ConexaoPDO::getInstance();
    }
    
     public function insert($curso){
         try {
             $stmt = $this->conn->prepare("INSERT INTO cursos (codigo,nome,preRequisito,cargaHora,valor,situacao) VALUES (?,?,?,?,?,?) ");
             $stmt->bindValue(1,$curso->getCodigo());
             $stmt->bindValue(2,$curso->getNome());
             $stmt->bindValue(3,$curso->getPreRequisito());
             $stmt->bindValue(4,$curso->getCargaHora());
             $stmt->bindValue(5,$curso->getValor());
             $stmt->bindValue(6,$curso->getSituacao());
             if($stmt->execute()){
                 return TRUE;
             }
                     
         } catch (PDOException $ex) {
             echo $ex->getMessage();
             return FALSE;
         }
         return FALSE;
     }
     
     
     public function delete($curso){
         try {
         $stmt = $this->conn->prepare("UPDATE cursos SET situacao=? WHERE codigo=?");
         $stmt->bindValue(1,$curso->getSituacao());
         $stmt->bindValue(2,$curso->getCodigo());
         if($stmt->execute()){
             return TRUE;
         }
         } catch (PDOException $ex) {
             echo $ex->getMessage();
             return FALSE;
         }
          return FALSE;
     }
     
     public function update($curso){
         try {
         $stmt = $this->conn->prepare("UPDATE cursos SET nome=?, prerequisito=?, cargahora=?,valor=? WHERE codigo =?");
         $stmt->bindValue(1,$curso->getNome());
         $stmt->bindValue(2,$curso->getPreRequisito());
         $stmt->bindValue(3,$curso->getCargaHora());
         $stmt->bindValue(4,$curso->getValor());
         $stmt->bindValue(5,$curso->getCodigo());
         if($stmt->execute()){
             return TRUE;
         }
         } catch (PDOException $ex) {
             echo $ex->getMessage();
             return FALSE;
         }
         return FALSE;
     }
    public function findAll(){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM cursos WHERE situacao=1 ORDER BY codigo");
        if($stmt->execute()){
            $cursos = Array();
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($cursos, $this->resultToCurso($res));
            }
            return $cursos;
        }else{
            echo "Não foi possível acessar o banco de dados.";
            return NULL;
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return NULL;
        }
    }
    
    public function findByNome($nome){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM cursos WHERE LOWER(nome) LIKE ? ORDER BY nome");
        $stmt->bindValue(1,$nome . '%');
        if($stmt->execute()){
            $cursos = Array();
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                print_r($res);
                array_push($cursos, $this->resultToCurso($res));
            }
            return $cursos;
        }
        } catch (PDOException $ex) {
            $ex->getMessage();
            return NULL;
        }
    }
    
    public function findByCodigo($codigo){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM cursos WHERE codigo=?");
        $stmt->bindValue(1,$codigo, PDO::PARAM_INT);
        if($stmt->execute()){
            $res=$stmt->fetch(PDO::FETCH_OBJ);
            return $this->resultToCurso($res);
        }
        else{
            echo "Não foi possível acessar o banco de dados";
            return NULL;
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return NULL;
        }
    }
    
      public function findCursoCancelado (){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM cursos WHERE situacao=2");
        if($stmt->execute()){
            $cursos = Array();
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($cursos, $this->resultToCurso($res));
            }
            return $cursos;
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return NULL;
        }
    }
        
    
    private function resultToCurso($res){
        $curso = new Curso();
        $curso->setCodigo($res->codigo);
        $curso->setNome($res->nome);
        $curso->setPreRequisito($res->prerequisito);
        $curso->setCargaHora($res->cargahora);
        $curso->setValor($res->valor);
        $curso->setSituacao($res->situacao);
        return $curso;
    }
    
    
}
