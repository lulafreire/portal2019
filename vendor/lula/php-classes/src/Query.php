<?php

namespace Lula;
use \Lula\DB\Sql;
use \Lula\Mailer;
use \Lula\Model;

class Query{

    public static function listAll() {
    
        // Pesquisa todos os usuários
        $sql = new Sql();
        return $sql->select("SELECT nome, origem, icon_query, numero FROM tb_sistemas UNION ALL SELECT nome, origem, icon_query, numero FROM tb_formularios UNION ALL SELECT nome, origem, icon_query, numero FROM tb_links UNION ALL SELECT nome, origem, icon_query, numero FROM tb_archives");
            
    }

    public static function listUnidades() {
    
        // Pesquisa todas as unidades
        $sql = new Sql();
        return $sql->select("SELECT codigo, nome FROM tb_unidades ORDER BY codigo ASC");
            
    }

    public static function buscaProcessos($q)
    {
        $sql = new Sql();
        return $sql->select("SELECT * from tb_archives WHERE nome like :q OR numero like :q ORDER BY nome ASC", array(
            ":q"=>"%".$q."%"
        ));

    }

    public static function buscaSistemas($q)
    {
        $sql = new Sql();
        return $sql->select("SELECT * from tb_sistemas WHERE nome like :q OR descricao like :q ORDER BY nome ASC", array(
            ":q"=>"%".$q."%"
        ));
    }
    
    public static function buscaFormularios($q)
    {
        $sql = new Sql();
        return $sql->select("SELECT * from tb_formularios WHERE nome like :q OR descricao like :q ORDER BY nome ASC", array(
            ":q"=>"%".$q."%"
        ));
    }
    
    public static function buscaLinks($q)
    {
        $sql = new Sql();
        return $sql->select("SELECT * from tb_links WHERE nome like :q OR descricao like :q ORDER BY nome ASC", array(
            ":q"=>"%".$q."%"
        ));
    }


}