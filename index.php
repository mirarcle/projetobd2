<?php include ('templates/conteudo_head.php'); ?>         
      <div class="containerg">
		<div class="containerg-interno">
          <div class="row" >
              <div class="col-sm-12 col-md-12 well center" id="content">
                  <h3>Acesso ao Sisitema</h3>
              </div>
          </div>  
         <?php include ('src/dao/databaseLogin.php');?>
         <form class = "form-signin" role = "form"
            action = "index.php" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" style=" margin-top: 25px;" type = "submit" 
               name = "login">Login</button>
         </form>
</div>         
      </div>        
<?php include ('templates/footer.php');
