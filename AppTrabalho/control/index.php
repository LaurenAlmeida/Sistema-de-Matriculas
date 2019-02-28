<?php

include_once "../model/Curso.php";

include_once "../pdo/ConexaoPDO.php";

include_once "../model/Turma.php";

include_once "../model/Curso.php";
include_once "../model/Aluno.php";
include_once "../pdo/AlunoPDO.php";
include_once "../pdo/CursoPDO.php";
include_once "../pdo/MatriculaPDO.php";
include_once "../pdo/TurmaPDO.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$alunoPDO = new AlunoPDO();
$cursoPDO = new CursoPDO();
$matriculaPDO = new MatriculaPDO();
$turmaPDO = new TurmaPDO();

$sair = 1;

while ($sair) {
    echo "\n\nSistema de Gerenciamento Escolar";
    echo "\n\n------Menu------";
    echo "\n1.Menu Aluno";
    echo "\n2.Menu Curso";
    echo "\n3.Menu Turma";
    echo "\n4.Menu Matrícula";
    echo "\n0.Sair";
    echo "\n----------------\n";
    $sair = readline();
    switch ($sair) {
        case 1:
            $exit = 1;
            while ($exit) {
                echo "\n\n--------Menu Aluno------------";
                echo "\n1.Cadastrar aluno";
                echo "\n2.Atualizar cadastro do aluno";
                echo "\n3.Excluir aluno";
                echo "\n4.Listar todos os alunos";
                echo "\n5.Listar alunos pelo nome";
                echo "\n6.Listar alunos pela matrícula";
                echo "\n7.Listar alunos egressos";
                echo "\n0.Sair";
                echo "\n--------------------------------\n";
                $exit = readline();
                switch ($exit) {
                    case 1:
                        cadastrarAluno();
                        break;
                    case 2:
                        atualizarAluno();
                        break;
                    case 3:
                        excluirAluno();
                        break;
                    case 4:
                        listarTodos();
                        break;
                    case 5:
                        listarNome();
                        break;
                    case 6:
                        listarMatricula();
                        break;
                    case 7:
                        listarAlunoCancelado();
                        break;
                }
            }
            break;
        case 2:
            $exit = 2;
            while ($exit) {
                echo "\n\n--------Menu Curso--------";
                echo "\n1.Cadastrar curso";
                echo "\n2.Atualizar curso";
                echo "\n3.Excluir curso";
                echo "\n4.Listar todos os cursos";
                echo "\n5.Listar pelo nome";
                echo "\n6.Listar pelo código";
                echo "\n7.Listar cursos encerrados";
                echo "\n0.Sair";
                echo "\n---------------------------\n";
                $exit = readline();
                switch ($exit) {
                    case 1:
                        cadastrarCurso();
                        break;
                    case 2:
                        atualizarCurso();
                        break;
                    case 3:
                        excluirCurso();
                        break;
                    case 4:
                        listarTodosCursos();
                        break;
                    case 5:
                        listarCursoNome();
                        break;
                    case 6:
                        listarCursoCod();
                        break;
                    case 7:
                        listarCursoCancelado();
                }
            }
            break;
        case 3:
            $exit = 3;
            while ($exit) {
                echo "\n\n--------Menu Turma---------";
                echo "\n1.Cadastrar turma";
                echo "\n2.Atualizar turma";
                echo "\n3.Excluir turma";
                echo "\n4.Listar todas as turmas";
                echo "\n5.Listar turma pelo código";
                echo "\n6.Listar turmas inativas";
                echo "\n0.Sair";
                echo "\n----------------------------\n";
                $exit = readline();
                switch ($exit) {
                    case 1:
                        cadastrarTurma();
                        break;
                    case 2:
                        atualizarTurma();
                        break;
                    case 3:
                        excluirTurma();
                        break;
                    case 4:
                        listarTurmas();
                        break;
                    case 5:
                        listarTurmaCod();
                        break;
                    case 6:
                        listarTurmasCanceladas();
                        break;
                }
            }
            break;
        case 4:
            $exit = 4;
            while ($exit) {
                echo "\n\n--------Menu Matrícula---------";
                echo "\n1.Efetuar matrícula";
                echo "\n2.Atualizar matrícula";
                echo "\n3.Excluir matrícula";
                echo "\n4.Listar todas as matrículas";
                echo "\n5.Listar matricula pelo id";
                echo "\n6.Listar matrícula pela forma de pagamento";
                echo "\n7.Listar matrícula pelo curso";
                echo "\n8.Listar matrícula pela turma";
                echo "\n9.Listar matrículas canceladas";
                echo "\n0.Sair";
                echo "\n----------------------------\n";
                $exit = readline();
                switch ($exit) {
                    case 1:
                        cadastrarMatricula();
                        break;
                    case 2:
                        atualizarMatricula();
                        break;
                    case 3:
                        excluirMatricula();
                        break;
                    case 4:
                        listarTodasMatriculas();
                        break;
                    case 5:
                        listarMatriculaId();
                        break;
                    case 6:
                        listarMatriculaPagto();
                        break;
                    case 7:
                        listarMatriculaCurso();
                        break;
                    case 8:
                        listarMatriculaTurma();
                        break;
                    case 9:
                        listarCanceladas();
                }
            }
    }
}

//Funções Aluno
    function cadastrarAluno() {
        $aluno = new Aluno();
        echo "\n\n------Cadastro de aluno------";
        echo "\nCPF do aluno:";
        $aluno->setCpf(readline());
        echo "\nRG do aluno:";
        $aluno->setRg(readline());
        echo "\nNome do aluno:";
        $aluno->setNome(readline());
        echo "\nTelefone:";
        $aluno->setFone(readline());
        echo "\nEndereço:";
        $aluno->setEndereco(readline());
        echo "\nNúmero de matrícula:";
        $aluno->setMatricula(readline());
        echo "\nSituação:";
        $aluno->setSituacao(readline());
        global $alunoPDO;
        if ($alunoPDO->insert($aluno)) {
            echo "\nAluno cadastrado com sucesso.";
        } else {
            echo "\nNão foi possível cadastrar o aluno.";
        }
    }

    function atualizarAluno() {
        global $alunoPDO;
        echo "\n----Atualizar cadastro do aluno------";
        echo "\nSelecione o aluno na lista abaixo,para isto digite seu número de matrícula.Para que um dado não seja alterado,digite 0 quando este for solicitado.";
        $alunos = $alunoPDO->findAll();
        if ($alunos != NULL) {
            echo "\nAlunos cadastrados:\n";
            print_r($alunos);
            echo "\nDigite o número da matrícula";
            $matricula = readline();
            $aluno = $alunoPDO->findByMatricula($matricula);
            if ($aluno != NULL) {
                echo "\nAtualize o nome do aluno:";
                $nome = readline();
                $aluno->setNome($nome);
                
                echo "\nAtualize o telefone para contato:";
                $fone = readline();
                $aluno->setFone($fone);
                
                echo "\nAtualize o endereço:";
                $endereco = readline();
                $aluno->setEndereco($endereco);
                
                echo "\nConfirme o número de matrícula do aluno:";
                $matricula= readline();
                $aluno->setMatricula($matricula);
                if ($alunoPDO->update($aluno)) {
                    print_r($aluno);
                    echo "Cadastro atualizado.";
                } else {
                    echo "\nNão foi possível atualizar o cadastro.";
                }
            } else {
                echo "\nErro ao selecionar aluno.";
            }
        }
    }

    function excluirAluno() {
        global $alunoPDO;
        echo "\n\n------Exclusão de Aluno------";
        echo "\nInforme o número de matrícula do aluno a ser excluído:";
        $matricula = readline();
        $alunos = $alunoPDO->findByMatricula($matricula);
        if ($alunos != NULL) {
            echo "\nAluno encontrado:";
            print_r($alunos);
            echo "\nDeseja excluir este aluno (s/n):\n";
            $op = readline();
            if ($op === 's') {
                $aluno = new Aluno();
                $aluno->setMatricula($matricula);
                $aluno->setSituacao('2');
                if ($alunoPDO->delete($aluno)) {
                    echo "\nRegistro excluído.";
                } else {
                    echo "\nNão foi possível excluir o registro.";
                }
            }
        }
    }

    
    function listarTodos() {
        global $alunoPDO;
        $alunos = $alunoPDO->findAll();
        if (!empty($alunos)) {
            echo "\nAlunos registrados:\n";
            print_r($alunos);
        } else {
            echo "\nNão existem alunos registrados.";
        }
    }

    function listarNome() {
        global $alunoPDO;
        echo "\n\n----Pesquisa por nome de aluno-----";
        echo "\nInforme o nome do aluno:";
        $nome = readline();
        $alunos = $alunoPDO->findByNome($nome);
        if ($alunos != NULL) {
            echo "\nAlunos encontrados:\n";
            print_r($alunos);
        } else {
            echo "\nAluno não encontrado.";
        }
    }

    function listarMatricula() {
        global $alunoPDO;
        echo "\n\n------Pesquisa por número de matrícula-----";
        echo "\nInforme o número de matricula a ser pesquisado:";
        $matricula = readline();
        $alunoEncontrado = $alunoPDO->findByMatricula($matricula);
        if ($alunoEncontrado != NULL) {
            echo "\nAluno encontrado:$alunoEncontrado";
        } else {
            echo "\nAluno não encontrado.";
        }
    }

     function listarAlunoCancelado() {
        global $alunoPDO;
        echo "\n\n----Pesquisa por alunos que sairam dessa escola-----";
        $alunos = $alunoPDO->findAlunoCancelado();
        if (!empty($alunos)) {
            echo "\nAlunos egressos:\n";
            print_r($alunos);
        } else {
            echo "\nNão existem alunos egressos.";
        }
    }
// Funções Curso
    function cadastrarCurso() {
        $curso = new Curso();
        echo "\n\n-----Cadastro de Curso----";
        echo "\nCódigo do curso:";
        $curso->setCodigo(readline());
        echo "\nNome do curso:";
        $curso->setNome(readline());
        echo "\nPré Requisito:";
        $curso->setPreRequisito(readline());
        echo "\nCarga Horária:";
        $curso->setCargaHora(readline());
        echo "\nValor:";
        $curso->setValor(readline());
        echo "\nSituação:";
        $curso->setSituacao(readline());
        global $cursoPDO;
        if ($cursoPDO->insert($curso)) {
            echo "\nCurso cadastrado.";
        } else {
            echo "\nErro ao cadastrar.";
        }
    }

    function atualizarCurso() {
        global $cursoPDO;
        echo "\n\n-------Atualização de curso------";
        echo "\nSelecione o aluno na lista abaixo,para isto digite seu número de matrícula.";
        $cursos = $cursoPDO->findAll();
        if ($cursos != NULL) {
            echo "\nCursos cadastrados:\n";
            print_r($cursos);
            echo "\nDigite o codígo do curso:";
            $codigo = readline();
            $curso = $cursoPDO->findByCodigo($codigo);
            if ($curso != NULL) {
                echo "\nNovo nome:";
                $nome = readline();
                $curso->setNome($nome);
                echo "\nNovo pré requisito:";
                $preRequisito = readline();
                $curso->setPreRequisito($preRequisito);
                echo "\nCarga horária:";
                $cargaHora = readline();
                $curso->setCargaHora($cargaHora);
                echo "\nValor:";
                $valor = readline();
                $curso->setValor($valor);
                echo "\nConfirme o código do curso:";
                $codigo = readline();
                $curso->setCodigo($codigo);
                if ($cursoPDO->update($curso)) {
                    print_r($curso);
                    echo "Curso atualizado com sucesso.";
                } else {
                    echo "Erro ao atualizar.";
                }
            } else {
                echo "\nNão foi possível atualizar este curso.";
            }
        }
    }

    function excluirCurso() {
        global $cursoPDO;
        echo "\n\n------Exclusão de Curso------";
        echo "\nInforme o código do curso a ser excluído:";
        $codigo = readline();
        $curso = $cursoPDO->findByCodigo($codigo);
        if ($curso != NULL) {
            echo "\nCursos encontrados:\n";
            print_r($curso);
            echo "\nDeseja excluir este curso (s/n):";
            $op = readline();
            if ($op === 's') {
                $curso = new Curso();
                $curso->setSituacao('2');
                $curso->setCodigo($codigo);
            }
        }
        if ($cursoPDO->delete($curso)) {
            echo "\nRegistro excluído com sucesso.";
        } else {
            echo "Erro ao excluir registro.";
        }
    }

    function listarTodosCursos() {
        global $cursoPDO;
        $curso = $cursoPDO->findAll();
        if ($curso != NULL) {
            echo "\nCursos cadastrados:\n";
            print_r($curso);
        } else {
            echo "\nNão há cursos cadastrados.";
        }
    }

    function listarCursoNome() {
        global $cursoPDO;
        echo "\n\n----Pesquisa por nome de curso-----";
        echo "\nInforme o nome do curso:";
        $nome = readline();
        $cursos = $cursoPDO->findByNome($nome);
        if ($cursos != NULL) {
            echo "\nCursos encontrados:\n";
            print_r($cursos);
        } else {
            echo "\nCurso não encontrado.";
        }
    }

    function listarCursoCod($curso) {
        global $cursoPDO;
        echo "\n\n------Pesquisa por código de curso-----";
        echo "\nInforme o código do curso a ser pesquisado:";
        $codigo = readline();
        $cursoEncontrado = $cursoPDO->findByCodigo($codigo);
        if ($cursoEncontrado != NULL) {
            echo "\nCurso encontrado:$cursoEncontrado";
        } else {
            echo "\nCurso não encontrado.";
        }
    }

     function listarCursoCancelado() {
        global $cursoPDO;
        echo "\n\n----Pesquisa por cursos cancelados-----";
        $cursos = $cursoPDO->findCursoCancelado();
        if (!empty($cursos)) {
            echo "\nCursos cancelados:\n";
            print_r($cursos);
        } else {
            echo "\nNão existem cursos cancelados.";
        }
    }
//Funções Turma
    function cadastrarTurma() {
        $turma = new Turma();
        echo "\n\n-----Cadastro de Turma----";
        echo "\nCódigo da turma:";
        $turma->setCod(readline());
        echo "\nTurno";
        $turma->setTurno(readline());
        echo "\nData de Inicio:";
        $turma->setDtIni(readline());
        echo "\nData de Término:";
        $turma->setDtFim(readline());
        echo "\nHora de inicio das aulas";
        $turma->setHrIni(readline());
        echo "\nHora de termino das aulas";
        $turma->setHrFim(readline());
        echo "\nQuantidade de vagas:";
        $turma->setQtdVagas(readline());
        echo "\nCódigo do curso:";
        $turma->setCurso(readline());
        $turma->setSituacao('1');
        global $turmaPDO;
        if ($turma != NULL) {
            if ($turmaPDO->insert($turma)) {
                echo "\nTurma cadastrada.";
            } else {
                echo "\nErro ao cadastrar.";
            }
        }
    }

    function atualizarTurma() {
        global $turmaPDO;
        echo "\n\n-------Atualização de turma------";
        echo "Para selecionar a turma,digite seu código.Para que um dado não seja alterado,digite 0 quando este for solicitado.";
        $turmas = $turmaPDO->findAll();
        print_r($turmas);
        echo "\nDigite o código da turma:";
        $codigo = readline();
        $turma = $turmaPDO->findByCodigo($codigo);
        if ($turma != NULL) {
            echo "\nData Inicial:";
            $dtaIni = readline();
            $turma->setDtIni($dtaIni);
            echo "\nData Final:";
            $dtaFim = readline();
            $turma->setDtFim($dtaFim);
            echo "\nQuantidade de vagas:";
            $vagas = readline();
            $turma->setQtdVagas($vagas);
            echo "\nConfirme o código da turma:";
            $codigo = readline();
            $turma->setCod($codigo);
            global $turmaPDO;
            if ($turmaPDO->update($turma)) {
                print_r($turma);
                echo "Turma atualizado com sucesso.";
            } else {
                echo "Erro ao atualizar.";
            }
        }
    }

    function excluirTurma() {
        global $turmaPDO;
        echo "\n\n------Exclusão de Turma------";
        echo "\nInforme o código da turma a ser excluído:";
        $codigo = readline();
        $turma = $turmaPDO->findByCodigo($codigo);
        if ($turma != NULL) {
            echo "\nTurma encontrada:";
            print_r($turma);
            echo "\nDeseja excluir esta turma (s/n):";
            $op = readline();
            if ($op === 's') {
                $turma = new Turma();
                $turma->setSituacao('2');
                $turma->setCod($codigo);
                if ($turmaPDO->delete($turma)) {
                    echo "\nRegistro exlcuído.";
                } else {
                    echo "\nNão foi possível excluir o registro.";
                }
            }
        } else {
            echo "\nTurma não encontrada.";
        }
    }

    function listarTurmas() {
        global $turmaPDO;
        $turmas = $turmaPDO->findAll();
        if ($turmas != NULL) {
            echo "\nTurmas cadastrados:\n";
            print_r($turmas);
        } else {
            echo "\nNão há turmas cadastradas.";
        }
    }

    function listarTurmaCod() {
        global $turmaPDO;
        echo "\n\n----Pesquisa por código turma-----";
        echo "\nInforme o código da turma:";
        $cod = readline();
        $turmas = $turmaPDO->findByCodigo($cod);
        if (!empty($turmas)) {
            echo "\nTurmas encontrados:\n";
            print_r($turmas);
        } else {
            echo "\nTurma não encontrada.";
        }
    }
    
     function listarTurmasCanceladas() {
        global $turmaPDO;
        echo "\n\n----Pesquisa por turma inativas ou fechadas-----";
        $turmas = $turmaPDO->findTurmasCanceladas();
        if (!empty($turmas)) {
            echo "\nTurmas canceladas:\n";
            print_r($turmas);
        } else {
            echo "\nNão existem turmas canceladas.";
        }
    }
    
//Funções Matrícula
    function cadastrarMatricula() {
        $matricula = new Matricula();
        echo "\n\n-----Cadastro de Matrícula----";
        echo "\nId da matrícula:";
        $matricula->setId_matricula(readline());
        echo "\nData";
        $matricula->setData(readline());
        echo "\nForma de pagamento:";
        $matricula->setFormaPagto(readline());
        echo "\nMatrícula do aluno:";
        $matricula->setAlunos(readline());
        echo "\nCódigo da turma:";
        $matricula->setTurmas(readline());
        echo "\nCódigo do curso:";
        $matricula->setCursos(readline());
        $matricula->setSituacao('1');
        global $matriculaPDO;
        if ($matricula != NULL) {
            if ($matriculaPDO->insert($matricula)) {
                echo "\nMatrícula efetuada com sucesso.";
            } else {
                echo "\nErro ao efetuar matrícula.";
            }
        }
    }

    function atualizarMatricula() {
        global $matriculaPDO;
        echo "\n\n-------Atualização de matrícula------";
        echo "Para selecionar a matrícula,digite seu id.Para que um dado não seja alterado,digite 0 quando este for solicitado.";
        $matriculas = $matriculaPDO->findAll();
        print_r($matriculas);
        echo "\nDigite o id da matrícula:";
        $id = readline();
        $matricula = $matriculaPDO->findById($id);
        if ($matricula != NULL) {
            echo "\nData da matrícula:";
            $data = readline();
            $matricula->setData($data);
            echo "\nForma de pagamento:";
            $forma = readline();
            $matricula->setFormaPagto($forma);
            $id;
            $matricula->setId_matricula($id);
             global $matriculaPDO;
            if ($matriculaPDO->update($matricula)) {
                print_r($matricula);
                echo "Matrícula atualizado com sucesso.";
            } else {
                echo "Erro ao atualizar.";
            }
        }
    }

    function excluirMatricula() {
        global $matriculaPDO;
        echo "\n\n------Exclusão de matrícula------";
        echo "\nInforme o id da matrícula a ser excluído:";
        $id = readline();
        $matricula = $matriculaPDO->findById($id);
        echo "\nInforme o curso que o aluno deseja cancelar a matrícula:";
        $curso = readline();
        $matricula = $matriculaPDO->findByCurso($curso);
        if ($matricula != NULL) {
            echo "\nMatrícula encontrada:";
            print_r($matricula);
            echo "\nDeseja excluir esta matrícula (s/n):";
            $op = readline();
            if ($op === 's') {
                $matricula = new Matricula();
                $matricula->setSituacao('2');
                $matricula->setId_matricula($id);
                $matricula->setCursos($curso);
                if ($matriculaPDO->delete($matricula)) {
                    echo "\nRegistro exlcuído.";
                } else {
                    echo "\nNão foi possível excluir o registro.";
                }
            }
        } else {
            echo "\nMatrícula não encontrada.";
        }
    }

    function listarTodasMatriculas() {
        global $matriculaPDO;
        $matriculas = $matriculaPDO->findAll();
        if ($matriculas != NULL) {
            echo "\nMatrículas cadastrados:\n";
            print_r($matriculas);
        } else {
            echo "\nNão há matrículas cadastradas.";
        }
    }

    function listarMatriculaId() {
        global $matriculaPDO;
        echo "\n\n----Pesquisa por id de matrícula-----";
        echo "\nInforme o id da matricula:";
        $id = readline();
        $matriculas = $matriculaPDO->findById($id);
        if (!empty($matriculas)) {
            echo "\nMatrícula encontrada:\n";
            print_r($matriculas);
        } else {
            echo "\nMatrícula não encontrada.";
        }
    }
    
    function listarMatriculaPagto() {
        global $matriculaPDO;
        echo "\n\n----Pesquisa por forma de pagamento-----";
        echo "\nInforme a forma de pagamento da matricula:";
        $forma = readline();
        $matriculas = $matriculaPDO->findByPagto($forma);
        if (!empty($matriculas)) {
            echo "\nMatrículas encontradas:\n";
            print_r($matriculas);
        } else {
            echo "\nForma de pagamento não encontrada.";
        }
    }
    
    function listarMatriculaCurso() {
        global $matriculaPDO;
        echo "\n\n----Pesquisa por cursos-----";
        echo "\nInforme o código do curso:";
        $id = readline();
        $matriculas = $matriculaPDO->findByCurso($id);
        if (!empty($matriculas)) {
            echo "\nMatrículas encontradas:\n";
            print_r($matriculas);
        } else {
            echo "\nCurso não encontrado.";
        }
    }
    
    function listarMatriculaTurma() {
        global $matriculaPDO;
        echo "\n\n----Pesquisa por turma-----";
        echo "\nInforme o código da turma:";
        $id = readline();
        $matriculas = $matriculaPDO->findByTurma($id);
        if (!empty($matriculas)) {
            echo "\nMatrículas encontradas:\n";
            print_r($matriculas);
        } else {
            echo "\nTurma não encontrada.";
        }
    }
                    
    function listarCanceladas() {
        global $matriculaPDO;
        echo "\n\n----Pesquisa por turma-----";
        $matriculas = $matriculaPDO->findCanceladas();
        if (!empty($matriculas)) {
            echo "\nMatrículas canceladas:\n";
            print_r($matriculas);
        } else {
            echo "\nNão existem matrículas canceladas.";
        }
    }
    ConexaoPDO::close();
    