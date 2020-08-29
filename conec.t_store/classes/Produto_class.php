<?php
/**
 * 
 */
class ProdutoClasss
{
	private $pdo;
	function __construct()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=conec.t', 'root', '');
		}catch (PDOException $e)
		{
			echo 'Erro com banco de dados: '.$e->getMenssage();
		}catch (Exception $e)
		{
			echo 'Erro generico: '.$e->getMenssage();
		}
	}

	public function enviarProduto($nome, $preco, $descricao, $telefone, $email, $fotos = array())
	{
		$cmd = $this->pdo->prepare('INSERT INTO produtos(nome_produto, preco_produto, descricao, telefone, email) values  (:n, :p, :d, :t, :e)');

		$cmd->bindValue(':n', $nome);
		$cmd->bindValue(':p', $preco);
		$cmd->bindValue(':d', $descricao);
		$cmd->bindValue(':t', $telefone);
		$cmd->bindValue(':e', $email);
		$cmd->execute();
		$id_produto = $this->pdo->LastInsertId();

		if(count($fotos) > 0){
			for ($i=0; $i < count($fotos); $i++) 
			{
				$nome_foto = $fotos[$i]; 
				$cmd = $this->pdo->prepare("INSERT INTO imagens(nome_imagem, fk_id_produto) values (:n, :fk)");
				$cmd->bindValue(':n', $nome_foto);
				$cmd->bindValue(':fk', $id_produto);
				$cmd->execute();
			}
		}
	}

	/*public function buscarProdutos()
	{
		$cmd = $this->pdo->query('SELECT *,(SELECT nome_imagem from imagens where fk_id_produto = produtos.id_produto LIMIT 1) as foto_capa
		 FROM produtos');
		if($cmd->rowCount() > 0)
		{
			$dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
		}else{
			$dados = array[];
		}
		return $dados;
	}*/

	public function buscarProdutoPorId($id)
	{

	}

	public function buscarImagensPorId($id){

	}
}
?>