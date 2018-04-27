
<h1>Categoria</h1>
<table>
    <tr>
        <th>id</th>
        <th>Nome</th>
        <th>Descricao</th>
    </tr>
    <tr>
        <td><?=$categoria->getId()?></td>
        <td><?=$categoria->getNome()?></td>
        <td><?=$categoria->getDescricao()?></td>
    </tr>

</table>
<a href="categorias.php?acao=alterar&id=<?= $categoria->getId()?>">Update</a>
<a href="categorias.php?acao=excluir&id=<?= $categoria->getId()?>">Delete</a>
