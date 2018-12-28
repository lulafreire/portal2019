<?php
use \Lula\DB\Sql;
use \Lula\Query;

function diaDaSemana()
{
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    echo strftime('%A, %d de %B de %Y', strtotime('today'));

}

function formataNumero($numero, $origem)
{
	$qNum = strlen($numero);

	switch($qNum)
	{
		case 10: //NB
			$n01 = substr($numero, 0, 3);
			$n02 = substr($numero, 3, 3);
			$n03 = substr($numero, 6, 3);
			$n04 = substr($numero, 9, 1);

			return $numero = "$n01.$n02.$n03-$n04";
		break;

		case 11: //NIT PIS PASEP
			$n01 = substr($numero, 0, 3);
			$n02 = substr($numero, 3, 5);
			$n03 = substr($numero, 8, 2);
			$n04 = substr($numero, 10, 1);

			return $numero = "$n01.$n02.$n03-$n04";
		break;

		case 17: //PROTOCOLO SIPPS ou CTC
			if($origem == 'CNIS')
			{
				$n01 = substr($numero, 0, 5);
				$n02 = substr($numero, 5, 6);
				$n03 = substr($numero, 11, 4);
				$n04 = substr($numero, 15, 2);

				return $numero = "$n01.$n02/$n03-$n04";
			}

			if($origem == 'CTC')
			{
				$n01 = substr($numero, 0, 8);
				$n02 = substr($numero, 8, 1);
				$n03 = substr($numero, 9, 5);
				$n04 = substr($numero, 14, 2);
				$n05 = substr($numero, 16, 1);

				return $numero = "$n01.$n02.$n03/$n04-$n05";
			}			
		break;

		default: // Outros formatos indefinidos
			return $numero;
		break;
	}
}

function iconQuery()
{
    $q = Query::listAll();
	
	$qtResults = count($q);

    for ($i=0; $i < $qtResults; $i++) 
    {		
		$origem = $q[$i]['origem'];
		switch($origem)
		{
			case "Sistemas": $icon = "fas fa-desktop"; break;
			case "Formularios": $icon = "far fa-file-alt"; break;
			case "Arquivos": $icon = "far fa-folder-open"; break;
			default: $icon = "fas fa-desktop"; break;
		}
	}
}


?>