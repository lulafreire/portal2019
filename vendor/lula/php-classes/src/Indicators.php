<?php 
namespace Lula;
use \Lula\DB\Sql;
use \Lula\Mailer;
use \Lula\Model;

class Indicators {

    // IMA-GDASS

    public static function imaGdassAtual()
    {
        //Ano atual
        $anoAtual = date('Y');
                
        $sql = new Sql();
        return $sql->select("SELECT competencia, indicador, mes FROM tb_imagdass WHERE competencia LIKE :anoAtual AND unidade = :lotacao ORDER BY competencia ASC", array(
            ":lotacao"=>$_SESSION[User::SESSION]['lotacao'],
            ":anoAtual"=>$anoAtual.'%'
        ));
        
    }

    public static function imaGdassAnterior()
    {
        //Ano atual
        $anoAtual = date('Y');
        //Ano anterior
        $anoAnt = $anoAtual - 1;
                
        $sql = new Sql();
        return $sql->select("SELECT competencia, indicador FROM tb_imagdass WHERE competencia LIKE :anoAnt AND unidade = :lotacao ORDER BY competencia ASC", array(
            ":lotacao"=>$_SESSION[User::SESSION]['lotacao'],
            ":anoAnt"=>$anoAnt.'%'
        ));
        
    }

    public static function currentImaGdass()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_imagdass WHERE unidade = :lotacao ORDER BY competencia DESC LIMIT 1", array(
            ":lotacao"=>$_SESSION[User::SESSION]['lotacao'],
        ));
    }

    public static function previewImaGdass()
    {
        // Verifica a última competência no banco de dados
        $currImagdass = Indicators::currentImagdass();
        $currentCompetencia = $currImagdass[0]['competencia'];
        
        // Define a competência anterior
        $mesAtual = ((int)substr($currentCompetencia, 4, 2));
        $anoAtual = ((int)substr($currentCompetencia, 0, 4));
        $anoAnterior = $anoAtual -1;
        
        if($mesAtual==1) {		
            $previewCompetencia = $anoAnterior."12";
        } else {
            $previewCompetencia = $currentCompetencia - 1;
        }
        

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_imagdass WHERE unidade = :lotacao and competencia = :competencia", array(
            ":lotacao"=>$_SESSION[User::SESSION]['lotacao'],
            ":competencia"=>$previewCompetencia
        ));
    }

    public function compareImaGdass()
    {
        $currImagdass = Indicators::currentImagdass();
        $imaGdassAtual = $currImagdass[0]['indicador'];
        $prevImagdass = Indicators::previewImaGdass();
        $imaGdassAnt = $prevImagdass[0]['indicador'];

        if($imaGdassAtual>$imaGdassAnt) 
        {
            $iconeImaGdass = "far fa-arrow-alt-circle-up";
        } 
        if($imaGdassAtual<$imaGdassAnt) 
        {
            $iconeImaGdass = "far fa-arrow-alt-circle-down";
        }
        if($imaGdassAtual==$imaGdassAnt)
        {
            $iconeImaGdass = "far fa-pause-circle";
        }
        
        return $iconeImaGdass;
    }

    // IIB
    public static function currentiib()
    {
        $currentCompetencia = date('Ym');

        $sql = new Sql();
		return $sql->select("SELECT * FROM tb_iib WHERE unidade = :lotacao and competencia = :competencia", array(
            ":lotacao"=>$_SESSION[User::SESSION]['lotacao'],
            ":competencia"=>$currentCompetencia
        ));
    }

    public static function previewiib()
    {
        $currentCompetencia = date('Ym');
        $previewCompetencia = $currentCompetencia - 1;

        $sql = new Sql();
		return $sql->select("SELECT * FROM tb_iib WHERE unidade = :lotacao and competencia = :competencia", array(
            ":lotacao"=>$_SESSION[User::SESSION]['lotacao'],
            ":competencia"=>$previewCompetencia
        ));
    }

    public function compareiib()
    {
        $curriib = Indicators::currentiib();
	    $iibAtual = $curriib[0]['indicador'];
        $previib = Indicators::previewiib();
        $iibAnt = $previib[0]['indicador'];

        if($iibAtual>$iibAnt) 
        {
            $iconeiib = "far fa-arrow-alt-circle-up";
        } 
        if($iibAtual<$iibAnt) 
        {
            $iconeiib = "far fa-arrow-alt-circle-down";
        }
       if($iibAtual==$iibAnt)
        {
            $iconeiib = "far fa-pause-circle";
        }
        
        return $iconeiib;
    }

    // Tarefas
    public static function currentTarefas()
    {
        $currentCompetencia = date('Ym');

        $sql = new Sql();
		return $sql->select("SELECT * FROM tb_tarefas WHERE unidade = :lotacao and competencia = :competencia", array(
            ":lotacao"=>$_SESSION[User::SESSION]['lotacao'],
            ":competencia"=>$currentCompetencia
        ));
    }

    public static function previewTarefas()
    {
        $currentCompetencia = date('Ym');
        $previewCompetencia = $currentCompetencia - 1;

        $sql = new Sql();
		return $sql->select("SELECT * FROM tb_tarefas WHERE unidade = :lotacao and competencia = :competencia", array(
            ":lotacao"=>$_SESSION[User::SESSION]['lotacao'],
            ":competencia"=>$previewCompetencia
        ));
    }

    public function compareTarefasConcluidas()
    {
        // Tarefas Concluidas
        $currTarefas = Indicators::currentTarefas();
	    $tarefasConcluidasAtual = $currTarefas[0]['concluidas'];
        $prevTarefas = Indicators::previewTarefas();
        $tarefasConcluidasAnt = $prevTarefas[0]['concluidas'];

        if($tarefasConcluidasAtual>$tarefasConcluidasAnt) 
        {
            $iconeTarefasConcluidas = "far fa-arrow-alt-circle-up";
        } 
        if($tarefasConcluidasAtual<$tarefasConcluidasAnt) 
        {
            $iconeTarefasConcluidas = "far fa-arrow-alt-circle-down";
        }
       if($tarefasConcluidasAtual==$tarefasConcluidasAnt)
        {
            $iconeTarefasConcluidas = "far fa-pause-circle";
        }
        
        return $iconeTarefasConcluidas;
        
    }

    public function compareTarefasPendentes()
    {

        // Tarefas Pendentes
        $currTarefas = Indicators::currentTarefas();
	    $tarefasPendentesAtual = $currTarefas[0]['pendentes'];
        $prevTarefas = Indicators::previewTarefas();
        $tarefasPendentesAnt = $prevTarefas[0]['pendentes'];

        if($tarefasPendentesAtual>$tarefasPendentesAnt) 
        {
            $iconeTarefasPendentes = "far fa-arrow-alt-circle-up";
        } 
        if($tarefasPendentesAtual<$tarefasPendentesAnt) 
        {
            $iconeTarefasPendentes = "far fa-arrow-alt-circle-down";
        }
       if($tarefasPendentesAtual==$tarefasPendentesAnt)        {
            $iconeTarefasPendentes = "far fa-pause-circle";
        }
        
        return $iconeTarefasPendentes;
        
    }

    // REPRESADOS
    public static function currentRepresados()
    {
        $sql = new Sql();
		return $sql->select("SELECT * FROM tb_represados WHERE unidade = :lotacao ORDER BY data DESC LIMIT 1", array(
            ":lotacao"=>$_SESSION[User::SESSION]['lotacao']
        ));
    }

    public static function previewRepresados()
    {
        $currRepresados  = Indicators::currentRepresados();
        $idCurrRepresados = $currRepresados[0]['id'];

        $sql = new Sql();
		return $sql->select("SELECT * FROM tb_represados WHERE unidade = :lotacao AND id < :idCurrRepresados ORDER BY data DESC LIMIT 1", array(
            ":lotacao"=>$_SESSION[User::SESSION]['lotacao'],
            ":idCurrRepresados"=>$idCurrRepresados
        ));
    }


    public function compareRepresados()
    {
        $currRepresados = Indicators::currentRepresados();
	    $represadosAtual = $currRepresados[0]['indicador'];
        $prevRepresados = Indicators::previewRepresados();
        $represadosAnt = $prevRepresados[0]['indicador'];

        if($represadosAtual>$represadosAnt) 
        {
            $iconeRepresados = "far fa-arrow-alt-circle-up";
        } 
        if($represadosAtual<$represadosAnt) 
        {
            $iconeRepresados = "far fa-arrow-alt-circle-down";
        }
       if($represadosAtual==$represadosAnt)
        {
            $iconeRepresados = "far fa-pause-circle";
        }
        
        return $iconeRepresados;
    }


}
 ?>