<?php include ('../templates/conteudo_head.php'); ?>
<?php include ('../templates/menu.php'); ?>
<?php include ('../src/core/session.php'); ?>
    <div id="page-wrapper">
       <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center"> Localidades do Brasil de Acordo com o IBGE </h1>
                </div>
                <form action="relatorio.php" method="POST">
                    <div class="col-md-4">
                        <label> Nome da localidade </label>
                        <input class="form-control" type="text" name="localidade"/>
                    </div>
                    <div class="col-md-4">
                        <label> Tipo </label>
                        <select class="form-control" type="text" name="tipo">
                            <option label="Selecione" value="" />
                            <option label="Região" value="REGIAO" />
                            <option label="UF" value="UF" />
                            <option label="Mesorregião" value="MESORREGIAO" />
                            <option label="Microrregião" value="MICRORREGIAO" />
                            <option label="Município" value="MUNICIPIO" />
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input class="btn btn-success" style="margin-top: 20px"type="submit" value="Buscar Dados"/>
                    </div>   
                </form>             
            </div>
        </div>
        <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    include '../src/busca_dados.php';
            }
        ?>
    </div>
<?php include ('../templates/footer.php');?>
