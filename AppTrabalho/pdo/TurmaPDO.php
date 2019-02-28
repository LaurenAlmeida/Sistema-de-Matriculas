<?php
include_once "../model/Turma.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TurmaPDO
 *
 * @author laurengoncalves
 */
class TurmaPDO {
    private $conn;
    
    public function __construct() {
        $this->conn = ConexaoPDO::getInstance();
    }
    
    public function insert($turma){
        try {
        $stmt = $this->conn->prepare("INSERT INTO turmas(cod,turno,dtini,dtfim,hrini,hrfim,qtdvagas,cod_curso,situacao) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bindValue(1,$turma->getCod());
        $stmt->bindValue(2,$turma->getTurno());
        $stmt->bindValue(3,$turma->getDtIni());
        $stmt->bindValue(4,$turma->getDtFim());
        $stmt->bindValue(5,$turma->getHrIni());
        $stmt->bindValue(6,$turma->getHrFim());
        $stmt->bindValue(7,$turma->getQtdVagas());
        $stmt->bindValue(8,$turma->getCurso());
        $stmt->bindValue(9,$turma->getSituacao());
         if($stmt->execute()){
          return TRUE;   
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return FALSE;
        }
       return FALSE;
    }
    
    public function delete($turma){
        try {
        $stmt = $this->conn->prepare("UPDATE turmas SET situacao=? WHERE cod=?");
        $stmt->bindValue(1,$turma->getSituacao());
        $stmt->bindValue(2,$turma->getCod());
        if($stmt->execute()){
            return TRUE;
        }
        } catch (PDOException $ex) {
            $ex->getMessage();
            return FALSE;
        }
    }
    
    public function update($turma){
        try {
        $stmt = $this->conn->prepare("UPDATE turmas SET dtini=?,dtfim =?,qtdvagas=? WHERE cod=?");
        $stmt->bindValue(1,$turma->getDtIni());
        $stmt->bindValue(2,$turma->getDtFim());
        $stmt->bindValue(3,$turma->getQtdVagas());
        $stmt->bindValue(4,$turma->getCod());
        if($stmt->execute()){
            return TRUE;
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return FALSE;
           }
    }
    
    public function findAll(){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM turmas WHERE situacao=1 ORDER BY cod");
        if($stmt->execute()){
            $turmas = Array();
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($turmas, $this->resultToTurma($res));
            }
            return $turmas;
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
    
    public function findByCodigo($codigo){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM turmas WHERE cod=?");
        $stmt->bindValue(1,$codigo,PDO::PARAM_INT);
        if($stmt->execute()){
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            return $this->resultToTurma($res);
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
    
      public function findTurmasCanceladas (){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM turmas WHERE situacao=2");
        if($stmt->execute()){
            $turmas = Array();
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($turmas, $this->resultToTurma($res));
            }
            return $turmas;
        }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return NULL;
        }
    }
        
    private function resultToTurma($res){
        $turma = new Turma();
        $turma->setCod($res->cod);
        $turma->setTurno($res->turno);
        $turma->setDtIni($res->dtini);
        $turma->setDtFim($res->dtfim);
        $turma->setHrIni($res->hrini);
        $turma->setHrFim($res->hrfim);
        $turma->setQtdVagas($res->qtdvagas);
        $turma->setMatriculas($res->id_matricula);
        $turma->setSituacao($res->situacao);
        return $turma;
    }
}
