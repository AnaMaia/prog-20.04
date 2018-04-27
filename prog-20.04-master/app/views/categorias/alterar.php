<h2>Alterar categoria</h2>
<form method="post" action="?acao=alterar">

    <input type="hidden" name="id" id="id" value="<?=$categoria->getId()?>"/>

    <label for="nome">nome</label>
    <input type="text" name="nome" id="nome" value="<?=$categoria->getNome()?>"/>
    <br>
    <label for="descricao">descricao</label>
    <textarea name="descricao" id="descricao" cols="30" rows="3"><?=$categoria->getDescricao()?></textarea>
    <br>
    <input type="submit" name="gravar" value="gravar"/>

</form>

