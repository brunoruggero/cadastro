<?php
require 'conexao.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT id, descricao, quantidade, valor FROM addproduto';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$produtos = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>...: Cadastro de Produtos :...</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet">
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
   <div class="container-fluid">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="index.php">...: Produtos :...</a>
     </div>
   </div>
 </nav>

 <div id="main" class="container-fluid" style="margin-top: 50px">
 <fieldset>
 	<div id="top" class="row">
		<div class="col-sm-6">
			<h2>Lista de Produtos</h2>
		</div>
		
		<div class="col-sm-6">
			<a href="adicionar.php" class="btn btn-primary pull-right h2">Novo Item</a>
		</div>
	</div> <!-- /#top -->
 
 
 	<hr />
 	<div id="list" class="row">
		
 <div class="table-responsive col-md-12">
  <?php if(!empty($produtos)):?>
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Código</th>
					<th>Descrição</th>
					<th>Quantidade</th>
					<th>Valor</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
   
   <?php foreach($produtos as $produto):?>
						<tr>
       <td><?=$produto->id?></td>
							<td><?=$produto->descricao?></td>
							<td><?=$produto->quantidade?></td>
							<td><?=$produto->valor?></td>
							
							<td>
								<a href='editar.php?id=<?=$produto->id?>' class="btn btn-warning">Editar</a>
								<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$produto->id?>">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
   </table>
  
  <?php else: ?>
		

				<!-- Mensagem caso não exista produtos ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem clientes cadastrados!</h3>
			<?php endif; ?>
   
	</div>
	</fieldset>
	</div> <!-- /#list -->
	
 </div> <!-- /#main -->

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
 
 <div class="footer">
  <center><p>...: Cadastro de Produto :...</p></center>
</div>
</body>
</html>