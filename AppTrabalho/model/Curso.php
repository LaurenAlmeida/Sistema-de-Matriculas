<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Curso
 *
 * @author laurengoncalves
 */
class Curso {
    private $codigo;
    private $nome;
    private $preRequisito;
    private $cargaHora;
    private $valor;
    private $turma;
    private $situacao;
    
    function __construct() {}

    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getPreRequisito() {
        return $this->preRequisito;
    }

    function getCargaHora() {
        return $this->cargaHora;
    }

    function getValor() {
        return $this->valor;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPreRequisito($preRequisito) {
        $this->preRequisito = $preRequisito;
    }

    function setCargaHora($cargaHora) {
        $this->cargaHora = $cargaHora;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }
    
    function getTurma() {
        return $this->turma;
    }

    function setTurma($turma) {
        $this->turma = $turma;
    }
    
    function getSituacao() {
        return $this->situacao;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function __toString() {
        return "\nCurso:$this->nome\n Código:$this->codigo\n Pré-Requisito:$this->preRequisito\n Carga Horária:$this->cargaHora\n Valor:$this->valor\n";
    }
}
