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
?>
<style>
/*CSS na pagina*/
div {
	margin: auto;
	width: 100%;
	height: 100%;
	text-align: center;
}
form {
	padding: 10px;
}
button, input {
	padding: 10px;
	width: 100%;
	margin-top: 20px;
	text-align: center;
	font-size: 18px;
}
</style>
<!--Entrada do input-->
<div>
	<form action="index.php" method="POST">
		<input id="entrada" name="entrada" autocomplete="off" autofocus required></input>
		<button type="submit">Registrar</button>
	</form>
</div>
