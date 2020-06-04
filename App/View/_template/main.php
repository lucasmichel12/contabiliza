 <!-- Left Panel -->
 <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">Menu Administrativo</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Gerenciar Cadastros</a>
					<ul class="sub-menu children dropdown-menu"> 
					
                        <li><i class="fa fa-user"></i><a href="<?= URL;?>Usuario/">Usuário</a></li>
                        <li><i class="fa fa-building-o"></i><a href="<?=URL;?>CentroCusto/">Centro de Custo</a></li>
                        <li><i class="fa fa-shopping-cart"></i><a href="#">Despesas</a></li>
                        <li><i class="fa fa-map"></i><a href="<?= URL;?>Regiao/">Regiões</a></li>
						
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Gerenciar Solicitações</a>
					<ul class="sub-menu children dropdown-menu"> 
					
                        <li><i class="fa fa-user"></i><a href="#">Pendentes</a></li>
                        <li><i class="fa fa-building-o"></i><a href="#">Concluidas</a></li>
						
                    </ul>
                </li>
                <li class="menu-title">Prestação de contas</li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Solicitações</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="">Nova Solicitação</a></li>
                        <li><i class="menu-icon fa fa-list-alt"></i><a href="">Abertas</a></li>
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
                <a class="navbar-brand" href="<?= URL;?>/Home"><img src="<?=URL;?>public/img/logo.png" alt="Logo"></a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                <div class="user-area dropdown float-right">
                    <a href="<?= URL;?>/Logout">Sair</a>    
                </div>
            </div>
        </div>
	</header>
    <main>