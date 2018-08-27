<?php
  if ($_SESSION['autenticado'] == false ) {
    header("location:../index.php");
  }
?>