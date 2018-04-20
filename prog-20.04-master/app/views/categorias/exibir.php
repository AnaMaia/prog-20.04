

        <h1> Detalhes Da Categoria - <?= $categoria->getNome(); ?> </h1>
        <p>Descricao: <?= $categoria->getDescricao();?> </p>

        <a href="categorias.php?acao=alterar&id=<?">editar a categoria</a>
        <br>
        <a href="categorias.php?acao=excluir">excluir a categoria</a>

