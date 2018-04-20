

<h1> CATEGORIAS</h1>
<a href="categorias.php?acao=inserir">inserir categoria</a>

<table>

    <tr>
        <th> # </th>
        <th> Nome Da Categoria </th>
    </tr>


    <?php foreach ($categorias as $categoria): ?>
        <tr>
            <td> <?= $categoria->getId(); ?> <td/>
            <td> <a href = "?acao=exibir&id=<?= $categoria->getId(); ?>" ><?= $categoria->getNome() ?> </a> </td>
        </tr>
    <?php endforeach;?>

</table>

