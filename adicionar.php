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

<!-- Função para valor monetário-->
<script>
 function mascara(o,f){
   v_obj=o
   v_fun=f
   setTimeout("execmascara()",1)
 }
 function execmascara(){
   v_obj.value=v_fun(v_obj.value)
 }
 function mreais(v){
   v=v.replace(/\D/g,"")           //Remove tudo o que não é dígito
   v=v.replace(/(\d{2})$/,",$1")       //Coloca a virgula
   v=v.replace(/(\d+)(\d{3},\d{2})$/g,"$1.$2")   //Coloca o primeiro ponto
   return v
 }

</script>
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
  
  <h2 class="page-header">Novo Produto</h2>
  
  <form method="POST" action="action_produto.php">
  	<div class="row">
         <div class="form-group col-md-12">
          <label for="descricao">Descrição</label>
          <input name="descricao" size="100" type="text" class="form-control" id="descricao"
                 placeholder="Digite a descrição do produto" required="required"/>
         </div>
       <div class="form-group col-md-2">
          <label for="quantidade">Quantidade</label>
          <input name="quantidade" type="number" class="form-control" id="quantidade"
                 placeholder="Informe a quantidade" required="required"/>
         </div>
       <div class="row">
        <div class="col-md-4">
          <label for="valor">Valor</label>
          <input name="valor" type="text" class="form-control" id="valor" placeholder="R$"
                 onkeypress="mascara(this,mreais)" required="required"/>
         </div>
        </div>
   </div>
   
	<hr />
	
	<div class="row">
	  <div class="col-md-12">
    <input type="hidden" name="acao" value="incluir">
	  	<input name="cadastrar" type="submit" class="btn btn-primary" value="Salvar"/>
    <a href='index.php' class="btn btn-default">Cancelar</a>    
	  </div>
	</div>

  </form>
 </div>
 

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 
 <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>