<?php
require 'conexao.php';

// Recebe o id do cliente do cliente via GET
$id_produto = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_produto) && is_numeric($id_produto)):

	// Captura os dados do produto solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, descricao, quantidade, valor FROM addproduto WHERE id = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_produto);
	$stm->execute();
	$produto = $stm->fetch(PDO::FETCH_OBJ);

endif;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>...: Cadastro de Produto :...</title>

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
 
 <div id="main" class="container-fluid">
  <fieldset>
  <h3 class="page-header">Editar Produto</h3>
  <?php if(empty($produto)):?>
				<h3 class="text-center text-danger">Cliente não encontrado!</h3>
			<?php else: ?>
<form method="post" action="action_produto.php">
  	<div class="row">
         <div class="form-group col-md-12">
          <label for="descricao">Descrição</label>
          <input name="descricao" size="100" type="text" class="form-control" id="descricao" value="<?=$produto->descricao?>"/>
         </div>
       <div class="form-group col-md-2">
          <label for="quantidade">Quantidade</label>
          <input name="quantidade" type="text" class="form-control" id="quantidade" value="<?=$produto->quantidade?>"/>
         </div>
       <div class="row">
        <div class="col-md-4">
          <label for="valor">Valor</label>
          <input name="valor" type="text" class="form-control" id="valor" placeholder="R$"
                 onkeypress="mascara(this,mreais)" value="<?=$produto->valor?>"/>
         </div>
        </div>
   </div>
   
	<hr />
	
	<div class="row">
	  <div class="col-md-12">
				<input type="hidden" name="acao" value="editar">
				<input type="hidden" name="id" value="<?=$produto->id?>">
	  	<input name="cadastrar" type="submit" class="btn btn-primary" value="Salvar"/>
    <a href='index.php' class="btn btn-default">Cancelar</a>
	  </div>
	</div>

  </form>
<?php endif; ?>
		</fieldset>
 </div>
 

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>