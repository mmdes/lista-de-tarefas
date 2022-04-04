<?php

	//o contexto onde o require foi recuperado muda pois ele foi acessado por tarefa_controller.php da pasta publica
	require "../../app_lista_tarefas/tarefa.model.php";
	require "../../app_lista_tarefas/tarefa.service.php";
	require "../../app_lista_tarefas/conexao.php";


	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'inserir'){

		$tarefa = new Tarefa();
		//setando o valor recebido via post
		$tarefa->__set('tarefa', $_POST['tarefa']);

		//criando uma instância de conexão
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);

		$tarefaService->inserir();

		header('Location: nova_tarefa.php?inclusao=1');
	} else if ($acao == 'recuperar'){
		//fazemos instância de tarefa també pois necessitamos atender a necessidade do construtor
		$tarefa = new Tarefa();
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();


	}




?>