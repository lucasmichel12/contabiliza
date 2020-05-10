<?php
require_once("Model/Viagem.php");
require_once("Model/Colaborador.php");
$colaborador = new Colaborador();
$viagens = new Viagem();
$tabela = $viagens->selectAll();
?>
<form>
    <div class="row">
        <div class="col-10">
            <input class="form-control " type="search" placeholder="Buscar viagem" aria-label="Search">
        </div>
        <div class="col-2">
            <button class="btn btn-outline-success " type="submit">Busca</button>
        </div>
    </div>
</form>
<table class="table table-borderless table-hover">
    <thead>
        <tr>
            <th scope="col"># Descrição</th>
            <th scope="col">Data</th>
            <th scope="col">Colaborador</th>
            <th scope="col">Situação</th>
            <th scope="col">Valor</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach (json_decode($tabela) as $linha)
            {
                $colaborador->selectOne($linha->idColaborador);
                $nome = $colaborador->getNome();
                echo "<tr>
                        <th width='20%'>#$linha->id - $linha->descricao</th> 
                        <td width='20%'> $linha->dataInicio</td> 
                        <td width='20%'> $nome</td> 
                        <td width='20%'> $linha->status</td> 
                        <td width='15%'> R$ $linha->custoTotal</td> 
                        <td width='5%'> <a href='solicitacao/editar/$linha->id' class='btn btn-warning btn-sm'> <i class='fa fa-edit'></i> </a>
                     </tr>";
            }
        ?>
    </tbody>
</table>