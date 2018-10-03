<?php include ('../templates/conteudo_head.php'); ?>
<?php include ('../templates/menu.php'); ?>
<?php include ('../src/core/session.php'); ?>
    <div id="page-wrapper">
       <div class="container">
            <div class="row">
			<div style="display: flex; justify-content: center;">
                <div class="col-md-6">
                    <a class="btn btn-lg btn-primary btn-block" href="home.php?api=true" >INICIAR INTEGRAÇÂO COM BASE DO IBGE</a>
                </div>
				</div>
                <div class="col-md-12">
                    <div class="divider"/>
                </div>
                <div class="col-md-12">
                    <?php 
                        if(isset($_GET['api'])){
                            if($_GET['api'] == true){
								?> <div class="grupo-regioes"> <?php
                                include '../src/ibge/ibgeRegioes.php';
                                ?></div><?php
                                ?> <div class="grupo-regioes"> <?php
								include '../src/ibge/ibgeUF.php';
                                ?></div><?php
                                ?> <div class="grupo-regioes"> <?php
								include '../src/ibge/ibgeMesorregioes.php';
                                ?></div><?php
                                ?> <div class="grupo-regioes"> <?php
								include '../src/ibge/ibgeMicrorregioes.php';
                                ?></div><?php
                                ?> <div class="grupo-regioes"> <?php
								include '../src/ibge/ibgeMunicipios.php';
                                ?></div><?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php include ('../templates/footer.php');?>
