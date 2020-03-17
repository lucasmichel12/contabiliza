<?php
	
	if ( !isset ( $rota ) ) {
		header("Location: index.php");
	}
	
?>


   <!-- Left Panel -->
   <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">Menu Administrativo</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Gerenciar Cadastros</a>
					<ul class="sub-menu children dropdown-menu"> 
					
                        <li><i class="fa fa-id-badge"></i><a href="cadastro/colaborador">Colaborador</a></li>
                        <li><i class="fa fa-bars"></i><a href="cadastro/filial">Filial</a></li>
                        <li><i class="fa fa-id-card-o"></i><a href="cadastro/despesas">Despesas</a></li>
						
                    </ul>
                </li>
                <li class="menu-title">Meus Relatórios</li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Despesas</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="#">Nova</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="#">Em processo</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
	</nav>
	
</aside>
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="./"><img src="public/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="public/images/logo.png" alt="Logo"></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                <div class="user-area dropdown float-right">
                    <a href="recursos/logout">Sair</a>    
                </div>
            </div>
        </div>
	</header>
    <main>

        <div class="container">
        <?php
                if(file_exists($rota)) {
                    include $rota;
                } else {
                    include "recursos/404.php";
                }

            ?>
        </div>

    </main>
</div>
