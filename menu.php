<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="cadPedido.php">Sistema de Tele Entregas</a>
    </div><!-- /.navbar-header -->
      <ul class="nav navbar-top-links navbar-right">          
        <li class="dropdown">
        	<p class="text-center">Logado como:</p>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                 <i class="h4"><?php echo $_SESSION['NmUsuario'];?></i><i class="fa"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                </li>                         
            </ul><!-- /.dropdown-user -->
        </li><!-- /.dropdown -->
    </ul><!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">                
                <li class="sidebar-search">
                </li>
                <li>
                    <a href="#" ><i class="fa fa-user fa-fw"></i>Usuário</a>
                    <ul class="nav btnFilho" id="side-menu">
						<li><a href="cadUsuario.php"><i class="fa fa-edit fa-fw"></i>Cadastrar</a></li>
						<li><a href="listUsuario.php"><i class="fa fa-list fa-fw"></i>Listar</a></li>
					</ul>                  
                </li>
                <li>
                    <a href="#"><i class="fa fa-check fa-fw"></i>Cliente</a>
                    <ul class="nav btnFilho" id="side-menu">
						<li><a href="cadCliente.php"><i class="fa fa-edit fa-fw"></i>Cadastrar</a></li>
						<li><a href="listCliente.php"><i class="fa fa-list fa-fw"></i>Listar</a></li>
					</ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-ticket fa-fw"></i>Produto</a>
                    <ul class="nav btnFilho" id="side-menu">
						<li><a href="cadProduto.php"><i class="fa fa-edit fa-fw"></i>Cadastrar</a></li>
						<li><a href="listProduto.php"><i class="fa fa-list fa-fw"></i>Listar</a></li>
					</ul>
                </li>
                <li>
                    <a href="#" ><i class="fa fa-paperclip fa-fw"></i>Pedido</a>
                    <ul class="nav btnFilho" id="side-menu">
						<li><a href="cadPedido.php"><i class="fa fa-edit fa-fw"></i>Cadastrar</a></li>
						<li><a href="listPedido.php"><i class="fa fa-list fa-fw"></i>Listar</a></li>
					</ul>                  
                </li>
                <li>
                    <a href="#"><i class="fa fa-table fa-fw"></i>Categoria</a>
                    <ul class="nav btnFilho" id="side-menu">
						<li><a href="cadCategoria.php"><i class="fa fa-edit fa-fw"></i>Cadastrar</a></li>
						<li><a href="listCategoria.php"><i class="fa fa-list fa-fw"></i>Listar</a></li>
					</ul>
                </li>
                <!--<li>
                    <a href="#"><i class="fa fa-institution fa-fw"></i>Item</a>
                    <ul class="nav btnFilho" id="side-menu">
						<li><a href="cadItem.php"><i class="fa fa-edit fa-fw"></i>Cadastrar</a></li>
						<li><a href="listItem.php"><i class="fa fa-list fa-fw"></i>Listar</a></li>
					</ul>
                </li>-->
            </ul>
        </div><!-- /.sidebar-collapse -->
    </div><!-- /.navbar-static-side -->
</nav>