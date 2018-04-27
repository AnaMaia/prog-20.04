<?php


require_once '../modelo/CRUDCategoria.php';

if (isset ($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){
    case 'index':


        $crud = new CRUDCategoria();
        $categorias = $crud->getCategorias();
        echo ('<pre>');

        include '../views/templates/cabecalho.php';
        include '../views/categorias/index.php';
        include '../views/templates/rodape.php';



        //percorrer array, exibindo os dados
        foreach ($categorias as $categoria){
            //exibir
        }

        break;
    case 'inserir':

        if (!isset($_POST['gravar'])){ //não digitou ainda, mostrar formulario

            include '../views/templates/cabecalho.php';
            include '../views/categorias/inserir.php';
            include '../views/templates/rodape.php';
        }else{  //já digitou - gravar
            //gravar dados digitados no BD
            $nome= $_POST['nome'];
            $descricao = $_POST['descricao'];
            $novaCat= new Categoria(null, $nome, $descricao);
            $crud= new CRUDCategoria();
            $crud->insertCategoria($novaCat);
            header('Location:categorias.php');
        }
        break;


    case 'alterar':

        if (!isset($_POST['gravar'])){ //nao nao digitou ainda - mostrar formulario
            $id = $_GET['id'];
            $crud = new CRUDCategoria();
            $categoria = $crud->getCategoria($id);

            include '../views/templates/cabecalho.php';
            include '../views/categorias/alterar.php';
            include '../views/templates/rodape.php';

        }else{ // já digitou - gravar

            //gravar dados digitados no BD
            $id = $_POST['id'];
            $nome= $_POST['nome'];
            $descricao = $_POST['descricao'];
            $novaCat= new Categoria($id, $nome, $descricao);
            $crud= new CRUDCategoria();
            $crud->updateCategoria($novaCat);
            header('Location:categorias.php');
        }
        break;



        case 'exibir':
            $id = $_GET['id'];
            $crud = new CRUDCategoria();
            $categoria = $crud->getCategoria($id);

            include '../views/templates/cabecalho.php';
            include '../views/categorias/exibir.php';
            include '../views/templates/rodape.php';
            break;

    default: //CASO NÃO SEJA NENHUMA DOS ANTERIORES
        echo 'Ação inválida';

}