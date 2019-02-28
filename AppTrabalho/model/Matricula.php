<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Matricula
 *
 * @author laurengoncalves
 */
class Matricula {
    
    private $id_matricula;
    private $data;
    private $formaPagto;
    private $alunos; //relação alunos
    private $turmas; //relação turmas 
    private $cursos; //relação cursos
    private $situacao;
  

   function __construct() {}

function getId_matricula() {
    return $this->id_matricula;
}

function getData() {
    return $this->data;
}

function getFormaPagto() {
    return $this->formaPagto;
}

function getAlunos() {
    return $this->alunos;
}

function getTurmas() {
    return $this->turmas;
}

function getCursos() {
    return $this->cursos;
}

function getSituacao() {
    return $this->situacao;
}

function setId_matricula($id_matricula) {
    $this->id_matricula = $id_matricula;
}

function setData($data) {
    $this->data = $data;
}

function setFormaPagto($formaPagto) {
    $this->formaPagto = $formaPagto;
}

function setAlunos($alunos) {
    $this->alunos = $alunos;
}

function setTurmas($turmas) {
    $this->turmas = $turmas;
}

function setCursos($cursos) {
    $this->cursos = $cursos;
}

function setSituacao($situacao) {
    $this->situacao = $situacao;
}

    
    public function __toString() {
        return "\nMatrícula:$this->numMat\n Data:$this->data\n Forma de Pagamento:$this->formaPagto\n";
    }

}
