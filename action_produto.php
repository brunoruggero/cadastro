<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Sistema de Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		require 'conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		$acao  = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$id    = (isset($_POST['id'])) ? $_POST['id'] : '';
		$descricao  = (isset($_POST['descricao'])) ? $_POST['descricao'] : '';
		$quantidade = (isset($_POST['quantidade'])) ? $_POST['quantidade'] : '';
		$valor    	= (isset($_POST['valor'])) ? $_POST['valor'] : '';


		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($descricao == '' || strlen($descricao) < 3):
				$mensagem .= '<li>Favor informar a descrição.</li>';
		    endif;
            
            if ($quantidade == ''):
				$mensagem .= '<li>Favor informar a quantidade.</li>';
		    endif;
            
            if ($valor == ''):
				$mensagem .= '<li>Favor informar o valor.</li>';
		    endif;
            
		endif;

		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			$sql = 'INSERT INTO addproduto (descricao, quantidade, valor)
							   VALUES(:descricao, :quantidade, :valor)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':descricao', $descricao);
			$stm->bindValue(':quantidade', $quantidade);
			$stm->bindValue(':valor', $valor);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;


		// Verifica se foi solicitada a edição de dados
		if ($acao == 'editar'):

			$sql = 'UPDATE addproduto SET descricao=:descricao, quantidade=:quantidade, valor=:valor ';
			$sql .= 'WHERE id = :id';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':descricao', $descricao);
			$stm->bindValue(':quantidade', $quantidade);
			$stm->bindValue(':valor', $valor);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;


		// Verifica se foi solicitada a exclusão dos dados
		if ($acao == 'excluir'):

			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM addproduto WHERE id = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
		?>

	</div>
</body>
</html>