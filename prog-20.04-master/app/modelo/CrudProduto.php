<?php


require_once "Conexao.php";
require_once "Produto.php";

class CrudProduto
{

    private $conexao;

    public function getProdutos(){
        $this-> conexao = Conexao::getConexao();
        $sql = 'select * from produto';

        $resultado = $this -> conexao -> query($sql);
        $produtos = $resultado -> fetchAll(PDO::FETCH_ASSOC);
        $lista_Produto = [];

        foreach ($produtos as $produto) {
            $id = $produto['id_produto'];
            $nome = $produto['nome_produto'];
            $descricao = $produto['descricao_produto'];
            $foto = $produto ['foto_produto'];
            $preco = $produto['preco_produto'];
            $id_categoria = $produto['id_categoria'];

            $lista_Produto[] = new Produto($id, $nome, $descricao, $foto, $preco, $id_categoria);
        }
        return $lista_Produto;
    }

    public function getProduto ($id){
        //recebe um $id inteiro e retorna o objeto categoria correspondente

        $this->conexao = Conexao::getConexao();
        $sql= "select * from produto where id_produto=".$id;
        $result = $this->conexao-> query($sql);
        $produto = $result->fetch(PDO::FETCH_ASSOC);
        $objProd = new Produto($produto['id_produto'], $produto['nome_produto'], $produto['descricao_produto'], $produto['foto_produto'], $produto['preco_produto'], $produto['id_categoria'] );
        return $objProd;
    }


    public function insertProduto ($produto){
        $this->conexao = Conexao::getConexao();
        //recebe um objeto $prod e insere na tabela categoria do BD
        $sql = "INSERT INTO produto (nome_produto, descricao_produto, foto_produto, preco_produto, id_categoria) VALUES ('".$produto->getNome()."', '{$produto->getDescricao()}', '{$produto->getFoto()}', '{$produto->getPreco()}', '{$produto->getIdCategoria()}')";
        echo $sql;
        try{
            $this -> conexao -> exec($sql);
        }catch (PDOException $e ){
            return $e -> getMessage();
        }

    }

    public function updateProduto ($produto){
        $this-> conexao = Conexao::getConexao();

        //recebe um inteiro e apaga o registro correspondente no BD
        $sql = "UPDATE produto set nome_produto = '".$produto->getNome()."', descricao_produto='".$produto->getDescricao()."'   where id_produto = ".$produto->getId() ;
        try{
            $this -> conexao -> exec($sql);
        }catch (PDOException $e ){
            return $e -> getMessage();
        }
    }

    public function deleteCategoria( $id){
        //recebe um inteiro e apaga o registro correspondente no BD
        $sql = "DELET from categoria where id_categoria = $id";
        try{
            $this -> conexao -> exec($sql);
        }catch (PDOException $e ){
            return $e -> getMessage();
        }
    }


//$croods  = new CRUDCategoria();
//$cats = $croods->getCategorias();
//
//var_dump($cats);
}