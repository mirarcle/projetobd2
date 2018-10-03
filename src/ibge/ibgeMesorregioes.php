<?php
	//Busca na API do IBGE		
	$url = 'https://servicodados.ibge.gov.br/api/v1/localidades/mesorregioes';

	try {
	    $ch = curl_init();
	      
	    if ($ch === false) {
	        throw new Exception('FALHA NA EXECUÇAÕ DA API [MESORREGIÕES-IBGE]!');
	    }

	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);

	    $content = curl_exec($ch);
	    
	    if ($content === false) {
	        throw new Exception(curl_error($ch), curl_errno($ch));
	    }
		curl_close($ch);

	    //Trata o retorno
	    $contet = json_decode($content, true);
	    echo '<h1>CAPTANDO MESORREGIÕES DA BASE DE DADOS DO IBGE</h1>';
	    foreach ($contet as $row) {
	    	//Salva localidade
	    	//verifica nome da localidade se não possui apóstrofo
	    	if (stripos($row['nome'],"'") !== false) {
			    $row['nome'] = str_replace("'","-",$row['nome']);
			}
	    	$sql = "INSERT INTO localidade (id_ibge, nome, tipo) VALUES (".$row['id'].", '".$row['nome']."', 'MESORREGIAO');";
	    	include '../src/dao/databaseQuery.php';
	    	//Salva Rregião
	    	$sql = "INSERT INTO mesorregiao (localidade_id, uf_localidade_id) VALUES (".$row['id'].", ".$row['UF']['id'].");";
	    	include '../src/dao/databaseQuery.php';
			echo '<p>MESORREGIÃO CAPTADA: </p><p style="color: #333367>'.$row['nome'].'</p>';
	    }    

	} catch(Exception $e) {
	    trigger_error(sprintf(
	        'ERRO: #%d: %s',
	        $e->getCode(), $e->getMessage()),
	        E_USER_ERROR);
	}

?>