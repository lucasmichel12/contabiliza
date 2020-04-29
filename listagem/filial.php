<?php
    require_once("Model/Filial.php");
    $filiais = new Filial();
    $tabela = $filiais->selectAll();

?>
<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Listagem</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="listagem/filial">Filial</a></li>
        </ol>
        </nav>
            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Ativo</th>
                <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              foreach (json_decode($tabela) as $linha) {
              echo "<tr>
                    <th>$linha->id</th>
                    <td>$linha->nome</td>
                    <td>$linha->cnpj</td>
                    <td>$linha->ativo</td>
                    <td>
						<a href='cadastro/filial/$linha->id' class='btn btn-success btn-sm'> <i class='fa fa-edit'></i> </a>
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
			location.href = "exclusao/filial/"+ id;
		}
	}

</script>