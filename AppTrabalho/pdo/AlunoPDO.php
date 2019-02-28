<?php

include_once "ConexaoPDO.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlunoPDO
 *
 * @author laurengoncalves
 */
class AlunoPDO {
   private $conn;
   
   public function __construct() {
       $this->conn = ConexaoPDO::getInstance();
   }
   
   public function insert($aluno){
       try {
       $stmt = $this->conn->prepare("INSERT INTO alunos(cpf,rg,nome,fone,endereco,matricula,situacao) VALUES (?,?,?,?,?,?,?)");
       $stmt->bindValue(1,$aluno->getCpf());
       $stmt->bindValue(2,$aluno->getRg());
       $stmt->bindValue(3,$aluno->getNome());
       $stmt->bindValue(4,$aluno->getFone());
       $stmt->bindValue(5,$aluno->getEndereco());
       $stmt->bindValue(6,$aluno->getMatricula());
       $stmt->bindValue(7,$aluno->getSituacao());
       if($stmt->execute()){
           return TRUE;
       }
       return FALSE;
       } catch (PDOException $ex) {
           echo $ex->getMessage();
           return FALSE;
       }
   }
   
   public function delete($aluno){
       try {
       $stmt = $this->conn->prepare("UPDATE alunos SET situacao=? WHERE matricula=?");
       $stmt->bindValue(1,$aluno->getSituacao());
       $stmt->bindValue(2,$aluno->getMatricula());
       if($stmt->execute()){
           return TRUE;
       }    
       } catch (PDOException $ex) {
           echo $ex->getMessage();
           return FALSE;
       }
   }
   
   public function update($aluno){
       try {
       $stmt = $this->conn->prepare("UPDATE alunos SET nome=?,fone=?,endereco=? WHERE matricula=?");
       $stmt->bindValue(1,$aluno->getNome());
       $stmt->bindValue(2,$aluno->getFone());
       $stmt->bindValue(3,$aluno->getEndereco());
       $stmt->bindValue(4,$aluno->getMatricula());
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
       $stmt = $this->conn->prepare("SELECT * FROM alunos WHERE situacao=1  ORDER BY nome");
       if($stmt->execute()){
           $alunos = Array();
           while($res = $stmt->fetch(PDO::FETCH_OBJ)){
               array_push($alunos, $this->resultToAluno($res));
           }
           return $alunos;
       }
       } catch (PDOException $ex) {
           echo $ex->getMessage();
           return NULL;
       }
   }
   
   public function findByNome($nome){
       try {
       $stmt = $this->conn->prepare("SELECT * FROM alunos WHERE nome LIKE ? ORDER BY nome");    
       $stmt->bindValue(1,$nome .'%');
       if($stmt->execute()){
           $alunos = Array();
           while ($res = $stmt->fetch(PDO::FETCH_OBJ)){
               array_push($alunos,$this->resultToAluno($res));
           }
           return $alunos;
       }
       } catch (PDOException $ex) {
           echo $ex->getMessage();
           return NULL;
       }
   }
   
    
   public function findByMatricula($matricula){
       try {
       $stmt = $this->conn->prepare("SELECT * FROM alunos WHERE matricula=?");
       $stmt->bindValue(1,$matricula);
       if($stmt->execute()){
           $res = $stmt->fetch(PDO::FETCH_OBJ);
           return $this->resultToAluno($res);
       }else{
           echo "Não foi possível acessar o banco de dados";
           return NULL;
       }
       } catch (PDOException $ex) {
           echo $ex->getMessage();
           return NULL;
       }
   }
   
     public function findAlunoCancelado (){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM alunos WHERE situacao=2");
        if($stmt->execute()){
            $alunos = Array();
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($alunos, $this->resultToAluno($res));
            }
            return $alunos;
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return NULL;
        }
    }
        
   
   private function resultToAluno($res){
       $aluno = new Aluno();
       $aluno->setCpf($res->cpf);
       $aluno->setRg($res->rg);
       $aluno->setNome($res->nome);
       $aluno->setEndereco($res->endereco);
       $aluno->setFone($res->fone);
       $aluno->setSituacao($res->situacao);
       $aluno->setMatricula($res->matricula);
       return $aluno;
       
   }
}
