<?php		
		$sql = "SELECT id_ibge AS id, nome, tipo FROM localidade";

		if ($_POST['localidade'] != '' && $_POST['tipo'] == ''){
			$sql = $sql." WHERE nome like '%".$_POST['localidade']."%'";
		}
		if ($_POST['localidade'] == '' && $_POST['tipo'] != ''){
			$sql = $sql." WHERE tipo like '".$_POST['tipo']."'";
		}
		if ($_POST['localidade'] != '' && $_POST['tipo'] != ''){
			$sql = $sql." WHERE tipo like '".$_POST['tipo']."' and nome like '%".$_POST['localidade']."%'";
		}
		$sql = $sql." order by nome asc;";

		include 'dao/databaseQuery.php';
?>
<table class="table table-hover table-bordered" style= "margin-top: 30px">
	<thead style="background-color: #8a8a5c; font-size: 14px; font-weight: bold; text-align: center; color: white; font-family: 'Arial Narrow';">
		<tr>
			<td>LOCALIDADE</td>
			<td>ID IBGE</td>
			<td>TIPO</td>			
		</tr>
	</thead>
	<tbody>
		<?php $total = 0; while($dado = pg_fetch_assoc($resultado)) { ?>
			<tr>			
				<td><?php echo $dado['nome']; ?></td>
				<td><?php echo $dado['id']; ?></td>
				<td><?php echo $dado['tipo']; ?></td>	
			<tr>
		<?php $total ++;} ?>
	</tbody>
	<tfooter>
		<tr style="background-color: #8a8a5c; font-size: 14px; font-weight: bold; text-align: center; color: white; font-family: 'Arial Narrow';">
			<td colspan="3">TOTAL DE <?php echo $total;?> LOCALIDADES</td>			
		</tr>
	</tfooter>
</table>		