<?php

namespace Lula;
use \Lula\DB\Sql;
use \Lula\Mailer;
use \Lula\Model;

class Arquivos{

    public static function getArquivos($lotacao, $page = 1, $itensPerPage = 7, $q)
    {
        $start = ($page - 1) * $itensPerPage;
        $sql = new Sql();
        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM tb_archives WHERE 
        unidade = :lotacao AND titular LIKE :q 
        OR unidade = :lotacao AND instituidor LIKE :q 
        OR unidade = :lotacao AND representante LIKE :q 
        OR unidade = :lotacao AND numero LIKE :numero 
        ORDER BY titular ASC LIMIT $start, $itensPerPage", array(
            ":lotacao"=>$lotacao,
            "q"=>"%".$q."%",
            "numero"=>"%".limpaPesquisa($q)."%"
        ));
        $total = $sql->select("SELECT FOUND_ROWS() AS nrtotal");

        return [
            "data"=>$results,
            "total"=>(int)$total[0]['nrtotal'],
            "pages"=>ceil($total[0]['nrtotal'] / $itensPerPage),
            "actual"=>$page
		];
    }

    public static function buscaArquivos($lotacao, $page = 1, $itensPerPage = 7, $q)
    {
        $start = ($page - 1) * $itensPerPage;
        $sql = new Sql();
        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM tb_archives WHERE 
        unidade = :lotacao AND titular LIKE :q 
        OR unidade = :lotacao AND instituidor LIKE :q 
        OR unidade = :lotacao AND representante LIKE :q 
        OR unidade = :lotacao AND numero LIKE :numero  
        ORDER BY titular ASC LIMIT $start, $itensPerPage", array(
            ":lotacao"=>$lotacao,
            "q"=>"%".$q."%",
            "numero"=>"%".limpaPesquisa($q)."%"
        ));
        $total = $sql->select("SELECT FOUND_ROWS() AS nrtotal");

        return [
            "data"=>$results,
            "total"=>(int)$total[0]['nrtotal'],
            "pages"=>ceil($total[0]['nrtotal'] / $itensPerPage),
            "actual"=>$page
		];
    }

    public function novoArquivo($dados)
    {
        $sql = new Sql();
        $sql->query("INSERT INTO tb_archives 
        (numero, titular, instituidor, representante, origem, caixa, unidade, dt_cadastro, dt_atualizacao, url, tam, descricao) 
        VALUES 
        (:numero, :titular, :instituidor, :representante, :origem, :caixa, :unidade, curdate(), curdate(), :anexo, :tam, :descricao)", array(
            ":numero"=>$dados['numero'],
            ":titular"=>$dados['titular'],
            ":instituidor"=>$dados['instituidor'],
            ":representante"=>$dados['representante'],
            ":origem"=>$dados['origem'],
            ":caixa"=>$dados['caixa'],
            ":unidade"=>$_SESSION[User::SESSION]['lotacao'],
            ":anexo"=>$dados['anexo'],
            ":tam"=>$dados['tam'],
            ":descricao"=>$dados['descricao']
        ));
    }

}