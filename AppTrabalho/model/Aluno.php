<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aluno
 *
 * @author laurengoncalves
 */
class Aluno {

    private $cpf;
    private $rg;
    private $nome;
    private $fone;
    private $endereco;
    private $matricula;
    private $situacao;
    private $matriculas; //relacao matricula   
    
    function __construct() {}

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getNome() {
        return $this->nome;
    }

    function getFone() {
        return $this->fone;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setFone($fone) {
        $this->fone = $fone;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }
    
    function getSituacao() {
        return $this->situacao;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    
        public function __toString() {
        return "\nAluno:$this->nome\n CPF:$this->cpf\n RG:$this->rg\n Matrícula:$this->matricula\n Situação:$this->situacao\n Endereço:$this->endereco\n Telefone:$this->fone\n";
    }
}
