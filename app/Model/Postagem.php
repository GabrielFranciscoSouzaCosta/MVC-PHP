<?php

	class Postagem
	{
		public static function selecionaTodos()
		{
			$conn = Connection::getConn();

			$sql = "SELECT * FROM postagem ORDER BY id DESC";
			$sql = $conn->prepare($sql);
			$sql->execute();
			
			while ($row = $sql->fetchObject('Postagem'))
			{
				$resultado[] = $row;
			}

			if(!$resultado)
			{
				throw new Exception("Não foi encontrado nenhum registro");
			}

			return $resultado;
		}

		public static function selecionarPorId($idPost)
		{
			$conn = Connection::getConn();
			$sql = "SELECT * FROM postagem WHERE id = :id";
			$sql = $conn->prepare($sql);
			$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
			$sql->execute();

			$resultado = $sql->fetchObject('Postagem');

			if(!$resultado)
			{
				throw new Exception("Não foi encontrado nenhum registro");
			}
			else
			{
				$resultado->comentarios = Comentario::selecionarComentarios($idPost);
			}

			return $resultado;
		}

		public static function insert($dadosPost)
		{
			if(empty($dadosPost['titulo']) || empty($dadosPost['conteudo']))
			{
				throw new Exception("Preencha todos os campos.");
				return false;
			}

			$conn = Connection::getConn();
			$sql = "INSERT INTO postagem (titulo, conteudo) VALUES (:tit, :cont)";
			$sql = $conn->prepare($sql);
			$sql->bindValue(':tit', $dadosPost['titulo']);
			$sql->bindValue(':cont', $dadosPost['conteudo']);
			$resultado = $sql->execute();

			if(!$resultado)
			{
				throw new Exception("Falha ao inserir publicacao");
				return false;
			}

			return true;
		}

		public static function update($params)
		{
			$conn = Connection::getConn();
			$sql = "UPDATE postagem SET titulo = :tit, conteudo = :cont WHERE id = :id";
			$sql = $conn->prepare($sql);

			$sql->bindValue(':tit', $params['titulo']);
			$sql->bindValue(':cont', $params['conteudo']);
			$sql->bindValue(':id', $params['id']);
			$resultado = $sql->execute();

			if($resultado == 0)
			{
				throw new Exception("Falha ao alterar publicação");
				return false;
			}

			return true;
		}

		public static function delete($id)
		{
			$conn = Connection::getConn();
			$sql = "DELETE FROM postagem WHERE id = :id";
			$sql = $conn->prepare($sql);
			$sql->bindValue(':id', $id);
			$resultado = $sql->execute();

			if($resultado == 0)
			{
				throw new Exception("Falha ao deletar publicação");
				return false;
			}

			return true;
		}
	}
