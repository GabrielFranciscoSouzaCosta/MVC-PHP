<?php

	class Comentario 
	{
		public static function selecionarComentarios($idPostagem)
		{
			$conn = Connection::getConn();
			$sql = "SELECT * FROM comentario WHERE id_postagem = :id";
			$sql = $conn->prepare($sql);
			$sql->bindValue(':id', $idPostagem, PDO::PARAM_INT);
			$sql->execute();

			$resultado = array();

			while($row = $sql->fetchObject('Comentario'))
			{
				$resultado[] = $row;
			}

			return $resultado;
		}

		public static function inserir($reqPost)
		{
			$conn = Connection::getConn();
			$sql = "INSERT INTO comentario (nome, mensagem, id_postagem) VALUES (:nom, :msg, :idpost)";
			$sql = $conn->prepare($sql);
			$sql->bindValue(':nom', $reqPost['nome']);
			$sql->bindValue(':msg', $reqPost['msg']);
			$sql->bindValue(':idpost', $reqPost['id']);
			$sql->execute();

			if($sql->rowCount())
			{
				return true;
			}

			throw new Exception("Erro ao adicionar comentario");
		}

	}
