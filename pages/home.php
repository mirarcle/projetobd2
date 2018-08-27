<?php include ('../templates/conteudo_head.php'); ?>
<?php include ('../templates/menu.php'); ?>
<?php include ('../src/core/session.php'); ?>
    <div id="page-wrapper">
       <div class="container">
            <div class="col-md-12">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div id="main" >
                        <h1 class="text-center"> Olá <?php $_SESSION['usuario']!?> </h1>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
<?php include ('../templates/footer.php');?>
