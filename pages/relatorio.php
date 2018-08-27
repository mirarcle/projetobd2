<?php include ('../templates/conteudo_head.php'); ?>
<?php include ('../templates/menu.php'); ?>
<?php include ('../src/core/session.php'); ?>
    <div id="page-wrapper">
       <div class="container">
            <div class="col-md-12">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div id="main" >
                        <h1 class="text-center"> Relatório de Bens Pessoais </h1>
                        <form  action="relatorio.php" method="POST">
                            <div>
                                <label> ID do Usuário </label>
                                <input class="form-control" type="text" name="usuario">
                            </div>                            
                            <div class="text-center">
                                <input class="btn btn-success" style="margin-top: 20px"type="submit" value="Buscar Dados">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
                
            </div>
        </div>
        <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    include '../src/busca_dados.php';
            }
        ?>
    </div>
<?php include ('../templates/footer.php');?>
