<?php
	//Busca na API do IBGE		
	$url = 'https://servicodados.ibge.gov.br/api/v1/localidades/municipios';

	try {
	    $ch = curl_init();
	      
	    if ($ch === false) {
	        throw new Exception('FALHA NA EXECUÇAÕ DA API [UFs-IBGE]!');
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
	    echo '<h1>CAPTANDO MUNICÍPIOS DA BASE DE DADOS DO IBGE ......</h1>';
	    foreach ($contet as $row) {
	    	//Salva localidade
	    	$sql = "INSERT INTO localidade (id_ibge, nome, tipo) VALUES (".$row['id'].", '".$row['nome']."', 'MUNICIPIO');";
	    	include '../dao/databaseQuery.php';
	    	//Salva Rregião
	    	$sql = "INSERT INTO municipio (localidade_id, regiao_localidade_id) VALUES (".$row['id'].", ".$row['microrregiao']['id'].");";
	    	include '../dao/databaseQuery.php';
	    	echo '<p>MUNICÍPIO CAPTADO: '.$row['nome'].'</p>';
	    }    

	} catch(Exception $e) {
	    trigger_error(sprintf(
	        'ERRO: #%d: %s',
	        $e->getCode(), $e->getMessage()),
	        E_USER_ERROR);
	}

?>