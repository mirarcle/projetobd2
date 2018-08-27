<?php
		date_default_timezone_set("Brazil/East"); //Definindo timezone padrão, data brasil
		
		$cliente = $_POST['usuario'];
		
		$sql = "SELECT bens.nome, bens.valor FROM bens INNER JOIN usuario ON bens.usuario_id = usuario.id 
		WHERE usuario.id = $cliente";

		include 'dao/databaseQuery.php';
?>
<table class="table table-hover table-bordered" style= "margin-top: 30px">
	<thead style="background-color: #8a8a5c; font-size: 14px; font-weight: bold; text-align: center; color: white; font-family: 'Arial Narrow';">
		<tr>	
			<td>Bem</td>
			<td>Valor</td>				
		</tr>
	</thead>
	<?php while($dado){ ?>
		<tr>				
			<td><?php echo $dado["nome"]; ?></td>
			<td><?php echo $dado["valor"]; ?></td>
		<tr>
	<?php } ?>
</table>		