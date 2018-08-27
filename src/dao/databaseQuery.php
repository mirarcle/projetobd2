<?php
	$conn= pg_connect("host=localhost dbname=bd2 user=postgres password=postgres");
	$resultado = pg_query($conn, $sql);

  	pg_close($conn);

  	$dado = pg_fetch_assoc($resultado);
?>