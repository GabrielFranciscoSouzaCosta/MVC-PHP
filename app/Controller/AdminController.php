<?php

class AdminController
{
	public function index()
	{
		$loader = new \Twig\Loader\FilesystemLoader('app/View');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('admin.html');

		$objPostagens = Postagem::selecionaTodos();

		$parametros = array(
			'postagens' => $objPostagens
		);

		$conteudo = $template->render($parametros);
		echo $conteudo;
	}

	public function create()
	{
		$loader = new \Twig\Loader\FilesystemLoader('app/View');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('create.html');
		$parametros = array();

		$conteudo = $template->render($parametros);
		echo $conteudo;
	}

	public function insert()
	{
		try
		{
			Postagem::insert($_POST);
			echo
			'<script>
				alert("Publicação inserida com sucesso.");
				location.href="http://localhost/gabriel/MVC-PHP/?pagina=admin&metodo=index"
			</script>';
		}
		catch(Exception $e)
		{
			echo
			'<script>
				alert("' . $e->getMessage() . '");
				location.href="http://localhost/gabriel/MVC-PHP/?pagina=admin&metodo=create"
			</script>';
		}
	}

	public function change($paramId)
	{
		$loader = new \Twig\Loader\FilesystemLoader('app/View');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('update.html');

		$post = Postagem::selecionarPorId($paramId);

		$parametros = array(
			'id' => $post->id,
			'titulo' => $post->titulo,
			'conteudo' => $post->conteudo
		);

		$conteudo = $template->render($parametros);
		echo $conteudo;
	}

	public function update()
	{

		try
		{
			Postagem::update($_POST);
			echo
			'<script>
				alert("Publicação alterada com sucesso.");
				location.href="http://localhost/gabriel/MVC-PHP/?pagina=admin&metodo=index"
			</script>';
		}
		catch (Exception $e)
		{
			echo
			'<script>
				alert("' . $e->getMessage() . '");
				location.href="http://localhost/gabriel/MVC-PHP/?pagina=admin&metodo=change&id=' . $_POST['id'] . '"
			</script>';
		}

	}

	public function delete($paramId)
	{
		try
		{
			Postagem::delete($paramId);
			echo
			'<script>
				alert("Publicação deletada com sucesso.");
				location.href="http://localhost/gabriel/MVC-PHP/?pagina=admin&metodo=index"
			</script>';
		}
		catch (Exception $e)
		{
			echo
			'<script>
				alert("' . $e->getMessage() . '");
				location.href="http://localhost/gabriel/MVC-PHP/?pagina=admin&metodo=index"
			</script>';
		}
	}
}
