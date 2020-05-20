<?php

class PostController
{
	public function index($params)
	{
		try
		{
			$postagem = Postagem::selecionarPorId($params);

			$loader = new \Twig\Loader\FilesystemLoader('app/View');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('single.html');

			$parametros = array(
				'id' => $postagem->id,
				'titulo' => $postagem->titulo,
				'conteudo' => $postagem->conteudo,
				'comentarios' => $postagem->comentarios
			);

			$conteudo = $template->render($parametros);
			echo $conteudo;
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function addComent()
	{
		try
		{
			Comentario::inserir($_POST);
			header('Location: http://localhost/gabriel/MVC%20+%20PHP/?pagina=post&id='. $_POST['id'] .'"');
		}
		catch (Exception $e)
		{
			echo
			'<script>
				alert("' . $e->getMessage() . '");
				location.href="http://localhost/gabriel/MVC%20+%20PHP/?pagina=post&id='. $_POST['id'] .'"
			</script>';
		}
	}

}
