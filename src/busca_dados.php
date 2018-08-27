<?php		
		$sql = "SELECT * FROM localidade JOIN regiao ON localidade.id = regiao.localidade_id JOIN uf on localidade.id = uf.regiao_localidade_id JOIN mesorregiao on localidade.id = mesorregiao.uf_localidade_id JOIN microrregiao localidade.id = microrregiao.mesorregiao_localidade_id JOIN municipio on localidade.id = municipio.microrregiao_localidade_id WHERE ";

		if ($_POST['localidade'] != '' && $_POST['tipo'] == ''){
			$sql = $sql."localidade.nome like '%".$_POST['localidade']."%'";
		}
		if ($_POST['localidade'] == '' && $_POST['tipo'] != ''){
			$sql = $sql."localidade.tipo like '%".$_POST['tipo']."%'";
		}
		if ($_POST['localidade'] != '' && $_POST['tipo'] != ''){
			$sql = $sql."localidade.tipo like '%".$_POST['tipo']."%' and localidade.nome like '%".$_POST['localidade']."%'";
		}
		$sql = $sql."order by nome asc;";
		echo $sql;
		include 'dao/databaseQuery.php';
?>
<table class="table table-hover table-bordered" style= "margin-top: 30px">
	<thead style="background-color: #8a8a5c; font-size: 14px; font-weight: bold; text-align: center; color: white; font-family: 'Arial Narrow';">
		<tr>	
			<td>LOCALIDADE</td>
			<td>SIGLA</td>
			<td>TIPO</td>			
		</tr>
	</thead>
	<?php while($dado){ ?>
		<tr>				
			<td><?php echo $dado["nome"]; ?></td>
			<td><?php echo isset($dado["sigla"]) ? $dado["sigla"] : '-'; ?></td>
			<td><?php echo $dado["tipo"]; ?></td>
		<tr>
	<?php } ?>
</table>		