<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="../resources/imagens/logo.png" alt="LOGO" height="80" />
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            </i>
                </a>
            </li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['usuario']; ?><b style="margin-left: 5px;" class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="../src/core/logout.php"><i class="fa fa-fw fa-power-off"></i> Sair </a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="../pages/relatorio.php">Dashbard</a>
                </li>
                <li>
                    <a href="../pages/relatorio.php">Banco de localidades</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>