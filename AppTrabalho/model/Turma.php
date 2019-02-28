<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Turma
 *
 * @author laurengoncalves
 */
class Turma {

    private $cod;
    private $turno;
    private $dtIni;
    private $dtFim;
    private $hrIni;
    private $hrFim;
    private $qtdVagas;
    private $curso;
    private $situacao;
    private $matriculas; //relacao matricula
    
    function __construct() {}

    function getCod() {
        return $this->cod;
    }

    function getTurno() {
        return $this->turno;
    }

    function getDtIni() {
        return $this->dtIni;
    }

    function getDtFim() {
        return $this->dtFim;
    }

    function getHrIni() {
        return $this->hrIni;
    }

    function getHrFim() {
        return $this->hrFim;
    }

    function getQtdVagas() {
        return $this->qtdVagas;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setTurno($turno) {
        $this->turno = $turno;
    }

    function setDtIni($dtIni) {
        $this->dtIni = $dtIni;
    }

    function setDtFim($dtFim) {
        $this->dtFim = $dtFim;
    }

    function setHrIni($hrIni) {
        $this->hrIni = $hrIni;
    }

    function setHrFim($hrFim) {
        $this->hrFim = $hrFim;
    }

    function setQtdVagas($qtdVagas) {
        $this->qtdVagas = $qtdVagas;
    }
    
    function getCurso() {
        return $this->curso;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }
    function getNumMat() {
        return $this->numMat;
    }

    function setNumMat($numMat) {
        $this->numMat = $numMat;
    }
    function getMatriculas() {
        return $this->matriculas;
    }

    function setMatriculas($matriculas) {
        $this->matriculas = $matriculas;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

        public function __toString() {
        return "\nTurma:$this->cod\n Código:$this->cod\n Turno:$this->turno\n Data de Início:$this->dtIni\n Data de Término:$this->dtFim\n Quantidade de Vagas:$this->qtdVagas\n";
    }
}
