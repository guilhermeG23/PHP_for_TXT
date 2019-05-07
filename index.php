<?php

#Criar tudo em unica pagina

#Decisao
#Gravar no arquivo TXT
#Isset confirma se existe e strlen confirma que a entrada e vazia
if (isset($_POST['entrada']) && strlen($_POST['entrada']) >= 1) {
	#Captura a entrada e quebra o texto pra baixo
	$entrada = $_POST['entrada'] . "\n";
	#Variavel que aponta qual e o arquivo
	$arquivo = 'registrar.txt';
	#Abre o arquivo com permissao de leitura, escrita no fim do arquivo, caso nao existe o arquivo, ele cria
	$abrir = fopen($arquivo, 'a+');
	#Escrever no arquivo 
	fwrite($abrir, $entrada);
	#Fechar o arquivo
	fclose($abrir);
}
#Valor da regra do tamanho do input e do tamanho da decisao
$tamanho_entrada = 10;
?>
<style>
/*CSS na pagina*/
div, h1, input {
	text-align: center;
}
div {
	margin: auto;
	width: 100%;
	height: 100%;
}
form {
	padding: 10px;
	border: 1px solid black;
}
h1 {
	font-size: 32px;
}
input {
	padding: 10px;
	width: 100%;
	margin-top: 20px;
	font-size: 18px;
}
</style>
<script>
//Contador de caracteres para ativar o registro automatico
//Toda a vez que o input receber alguma entrada a funcao roda
function calcular(entrada_input) {
	//Pega o tamanho da valor do input entrada
	const valor = document.getElementById('entrada');
	//Somador por caracter
	const contadorPorLetra = 1;
	//Contador de espacos
	const espacos = (entrada_input.value.split(" ").length - 1);
	//Contar o tamanho do input
	const caracteres = entrada_input.value.length;
	//Fazendo a conta
	const contador = (parseInt((caracteres - espacos) * contadorPorLetra)); 
	//Verificando a situacao para ativar ou nao a decisao
	if (contador >= <?=$tamanho_entrada;?>) {
		//Caso tenha o tamanho correto, ele manda dar um submit no for, isso recarrega a pagina, ativando a decisao do php
		document.getElementById("cadastrar").submit();
	}
}
</script>
<!--Entrada do input-->
<div>
	<form action="index.php" method="POST" id="cadastrar">
		<h1>Entrar com o codigo de barras</h1>
		<input id="entrada" name="entrada" onkeyup="calcular(this)" autocomplete="off" autofocus maxlength="<?=$tamanho_entrada;?>" placeholder="entrada do codigo de barras..." required></input>
	</form>
</div>
