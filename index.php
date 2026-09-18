<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
</head>
<body>
    <?php
    include_once "func.php";
    $dados = [];
    $dados = readData("dados.json");
    $id = $_GET['id'] ?? "";
    $resp = $_GET['resp'] ?? "";
    $registro = [];
    if($id >= 0)
    {
        $registro = $dados[$id];
    }
    ?>
    <div class="container">
        <div class="card">
            <h1> Página Inicial da Loja </h1> <br>

            <h2> Olá! Bem-vindo(a) á nossa loja! Vendemos produtos variados aqui, venha conferir! </h2> <br> <hr> <br>

            <h2> Abaixo, segue um formulário para se inserir produtos. </h2>

            <form action="salvar.php?=id=<?= $id?>" method="post">
                <div>
                    <label for="nome"> Nome </label> <br>
                    <input type="text" name="nome" id="nome" value="<?=$registro['nome'] ?? '' ?>">
                </div>
                <div>
                    <label for="desc"> Descrição </label> <br>
                    <input type="text" name="desc" id="desc" value="<?=$registro['desc'] ?? '' ?>">
                </div>
                <div>
                    <label for="valor"> Valor </label> <br>
                    <input type="text" name="valor" id="valor" value="<?=$registro['valor'] ?? '' ?>">
                </div>
                <div>
                    <label for="img"> Imagem (link) </label> <br>
                    <input type="text" name="img" id="img" value="<?=$registro['img'] ?? '' ?>">
                </div>
                <div>
                    <label for="categ"> Categoria </label> <br>
                    <input type="text" name="categ" id="categ" value="<?=$registro['categ'] ?? '' ?>">
                </div>
                
                <div class="buttons">
                    <button type="reset"> Cancelar </button>
                    <button type="submit"> Salvar </button>
                </div>
            </form>
            <div> <?= $resp ?> </div>
            <hr> <br>
            <table>
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Nome </th>
                        <th> Descrição </th>
                        <th> Valor </th>
                        <th> Imagem </th>
                        <th> Categoria </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($dados as $id => $item)
                        {
                    ?>
                    <tr>
                        <td><?=$id?></td>
                        <td><?=$item['nome']?></td>
                        <td><?=$item['desc']?></td>
                        <td><?=$item['valor']?></td>
                        <td><?=$item['img']?></td>
                        <td><?=$item['categ']?></td>

                        <td><a href="index.php?id=<?=$id?>">Editar</a> | <a href="apagar.php?id=<?=$id?>">Apagar</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>