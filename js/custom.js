/* Atribui ao evento submit do formulário a função de validação de dados */
var form = document.getElementById("form-contato");
if (form != null && form.addEventListener) {                   
    form.addEventListener("submit", validaCadastro);
} else if (form != null && form.attachEvent) {                  
    form.attachEvent("onsubmit", validaCadastro);
}

/* Atribui ao evento click do link de exclusão na página de consulta a função confirmaExclusao */
var linkExclusao = document.querySelectorAll(".link_exclusao");
if (linkExclusao != null) { 
	for ( var i = 0; i < linkExclusao.length; i++ ) {
		(function(i){
			var id_cliente = linkExclusao[i].getAttribute('rel');

			if (linkExclusao[i].addEventListener){
		    	linkExclusao[i].addEventListener("click", function(){confirmaExclusao(id_cliente);});
			}else if (linkExclusao[i].attachEvent) { 
				linkExclusao[i].attachEvent("onclick", function(){confirmaExclusao(id_cliente);});
			}
		})(i);
	}
}

/* Função para validar os dados antes da submissão dos dados */
function validaCadastro(evt){
	var descricao = document.getElementById('descricao');
	var quantidade = document.getElementById('quantidade');
	var valor = document.getElementById('valor');
	var contErro = 0;


	/* Validação do campo descricao */
	caixa_descricao = document.querySelector('.msg-descricao');
	if(descricao.value == ""){
		caixa_descricao.innerHTML = "Favor informar a descrição do produto.";
		caixa_descricao.style.display = 'block';
		contErro += 1;
	}else{
		caixa_descricao.style.display = 'none';
	}
    
    /* Validação do campo quantidade */
	caixa_quantidade = document.querySelector('.msg-quantidade');
	if(quantidade.value == ""){
		caixa_quantidade.innerHTML = "Favor informar a quantidade do produto.";
		caixa_quantidade.style.display = 'block';
		contErro += 1;
	}else{
		caixa_quantidade.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}
    
    /* Validação do campo valor */
	caixa_valor = document.querySelector('.msg-valor');
	if(valor.value == ""){
		caixa_valor.innerHTML = "Favor informar o valor do produto.";
		caixa_valor.style.display = 'block';
		contErro += 1;
	}else{
		caixa_valor.style.display = 'none';
	}
    
}

/* Função para exibir um alert confirmando a exclusão do registro*/
function confirmaExclusao(id){
	retorno = confirm("Deseja excluir esse Registro?")

	if (retorno){

	    //Cria um formulário
	    var formulario = document.createElement("form");
	    formulario.action = "action_produto.php";
	    formulario.method = "post";

		// Cria os inputs e adiciona ao formulário
	    var inputAcao = document.createElement("input");
	    inputAcao.type = "hidden";
	    inputAcao.value = "excluir";
	    inputAcao.name = "acao";
	    formulario.appendChild(inputAcao); 

	    var inputId = document.createElement("input");
	    inputId.type = "hidden";
	    inputId.value = id;
	    inputId.name = "id";
	    formulario.appendChild(inputId);

	    //Adiciona o formulário ao corpo do documento
	    document.body.appendChild(formulario);

	    //Envia o formulário
	    formulario.submit();
	}
}
