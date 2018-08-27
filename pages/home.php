<?php include ('../templates/conteudo_head.php'); ?>
<?php include ('../templates/menu.php'); ?>
<?php include ('../src/core/session.php'); ?>
    <div id="page-wrapper">
       <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center"> Olá <?php echo $_SESSION['usuario'];?>!</h1>
                </div>
                <div class="col-md-12">
                    <a class="btn btn-success" href="home.php?api=true" >INICIAR INTEGRAÇÂO COM BASE DO IBGE</a>
                </div>
                <div class="col-md-12">
                    <div class="divider"/>
                </div>
                <div class="col-md-12">
                    <?php 
                        if(isset($_GET['api'])){
                            if($_GET['api'] == true){
                                include '../src/ibge/ibgeRegioes.php';
                                echo '<p>---------------------------------------------------------------------------</p>';
                                include '../src/ibge/ibgeUF.php';
                                echo '<p>---------------------------------------------------------------------------</p>';
                                include '../src/ibge/ibgeMesorregioes.php';
                                echo '<p>---------------------------------------------------------------------------</p>';
                                include '../src/ibge/ibgeMicrorregioes.php';
                                echo '<p>---------------------------------------------------------------------------</p>';
                                include '../src/ibge/ibgeMunicipios.php';
                                echo '<p>---------------------------------------------------------------------------</p>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php include ('../templates/footer.php');?>
