<?php

/*controllers/categorias.php

AÇÃO PRINCIPAL - LISTAR TODAS AS CATEGORIAS

 */

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
        include '../views/templates/cabecalho.php';
        include '../views/categorias/inserir.php';

        include '../views/templates/rodape.php';




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