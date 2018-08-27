<?php
  $msg = '';
  if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    
    $sql = "SELECT * FROM usuario WHERE nome = '".$_POST['username']."' and senha='".$_POST['password']."';";

    include 'databaseQuery.php';

    if ($dado['nome'] == $_POST['username']) {  
      $_SESSION['usuario'] = $dado['nome'];
      $_SESSION['autenticado'] = true;                 
      header("location:pages/home.php");
    }else {
      $_SESSION['autenticado'] = false; 
      $msg = 'Falha ao autenticar!';
    }
  }
?>