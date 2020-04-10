<?php
    require_once("config/MySqlPDO.php");
    require_once("Model/Colaborador.php");
    $colaboradores = new Colaborador();
    $tabela = $colaboradores->selectAll();

?>
<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Listagem</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="listagem/colaborador">Colaborador</a></li>
        </ol>
        </nav>
            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Ativo</th>
                <th scope="col">Administrador</th>
                <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              foreach (json_decode($tabela) as $linha) {
              echo "<tr>
                    <th>$linha->id</th>
                    <td>$linha->nome</td>
                    <td>$linha->ativo</td>
                    <td>$linha->admin</td>
                    <td>
						<a href='cadastro/colaborador/$linha->id' class='btn btn-success btn-sm'> <i class='fa fa-edit'></i> </a>
						<a href='javascript:excluir($linha->id)' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>
					</td>
                  </tr>";
              }
            ?>
            </tbody>
            </table>
</div>



<script>
//funcao em javascript para perguntar se quer mesmo excluir
function excluir(id) {
		//perguntar
		if ( confirm("Deseja mesmo excluir? Tem certeza?" ) ) {
			//chamar a tela de exclusão
			location.href = "exclusao/colaborador/"+ id;
		}
	}

</script>