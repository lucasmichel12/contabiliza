 <!-- Left Panel -->
 <aside id="left-panel" class="left-panel">
     <nav class="navbar navbar-expand-sm navbar-default">
         <div id="main-menu" class="main-menu collapse navbar-collapse">
             <ul class="nav navbar-nav">
                 <li class="menu-title">Menu Administrativo</li><!-- /.menu-title -->
                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Gerenciar Cadastros</a>
                     <ul class="sub-menu children dropdown-menu">

                         <li><i class="fa fa-user"></i><a href="<?= URL; ?>Usuario/">Usuário</a></li>
                         <li><i class="fa fa-building-o"></i><a href="<?= URL; ?>CentroCusto/">Centro de Custo</a></li>
                         <li><i class="fa fa-shopping-cart"></i><a href="<?= URL; ?>Despesa/">Despesas</a></li>
                         <li><i class="fa fa-map"></i><a href="<?= URL; ?>Regiao/">Regiões</a></li>

                     </ul>
                 </li>
                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Gerenciar Solicitações</a>
                     <ul class="sub-menu children dropdown-menu">

                         <li><i class="fa fa-user"></i><a href="<?=URL;?>Solicitacao/solicitacoesPendentes">Pendentes</a></li>
                         <li><i class="fa fa-building-o"></i><a href="<?=URL;?>Solicitacao/solicitacoesConcluidas">Concluidas</a></li>

                     </ul>
                 </li>
                 <li class="menu-title">Prestação de contas</li><!-- /.menu-title -->

                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Solicitações</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="menu-icon fa fa-plus-circle"></i><a href="#" data-toggle="modal" data-target="#novaSolicitacao">Nova Solicitação</a></li>
                         <li><i class="menu-icon fa fa-list-alt"></i><a href="<?= URL; ?>Solicitacao/">Aberta</a></li>
                         <li><i class="menu-icon fa fa-list-alt"></i><a href="<?= URL; ?>">Concluidas</a></li>
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
                 <a class="navbar-brand" href="<?= URL; ?>/Home"><img src="<?= URL; ?>public/img/logo.png" alt="Logo"></a>
                 <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
             </div>
         </div>
         <div class="top-right">
             <div class="header-menu">
                 <div class="header-left">
                     <div class="user-area dropdown float-right">
                         <a href="<?= URL; ?>/Logout">Sair</a>
                     </div>
                 </div>
             </div>
     </header>

     <!-- Modal -->
     <div class="modal fade" id="novaSolicitacao" tabindex="-1" role="dialog" aria-labelledby="novaSolicitacao" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="novaSolicitacao">Nova Solicitação</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     
                     <!-- Formulário Nova Solicitação -->
                     <form action="<?= URL; ?>Solicitacao/abrirSolicitacao" method="POST">
                     <input type="hidden" name="id_usuario" value="<?=$_SESSION['usuario_logado']['id'];?>">
                         <div class="form-row">
                             <div class="col">
                                 <input type="text" class="form-control" required placeholder="Descrição da solicitação" name="descricao">
                             </div>
                             <div class="col">
                                 <input type="date" class="form-control" name="data">
                             </div>
                         </div>
                         <div class="modal-footer">
                             <a class="btn btn-danger text-white" data-dismiss="modal">Fechar</a>
                             <button type="submit" class="btn btn-success">Continuar</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <main>