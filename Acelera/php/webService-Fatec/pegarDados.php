<?php
  	
	header('Content-Type: text/html; charset=utf-8');

	$nome=$_GET['nome'];

	try
	{
		$conecta = new PDO('mysql:host=localhost;port=3306;dbname=safehouse','root','');
		$conecta->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$consulta = $conecta->query("SELECT * FROM usuario WHERE nome = '$nome'");

		$data = array();

		foreach($consulta as $linhas)
		{
			$data["dados"][]=$linhas;
			//$data = $linha ['alarmeNomeCasa'];
		}
		echo json_encode($data);

	}
	catch(PDOExcpetion $erro)
	{
		echo "Ocorreu um erro ao verificar dados: = $erro";
	}
?>