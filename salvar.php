<?php
    include_once "func.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $id = $_GET['id'] ?? '';
        $nome = $_POST['nome'] ?? '';
        $desc = $_POST['desc'] ?? '';
        $valor = $_POST['valor'] ?? '';
        $img = $_POST['img'] ?? '';
        $categ = $_POST['categ'] ?? '';
    }

    $novoContato = [
        "nome" => $nome,
        "desc" => $desc,
        "valor" => $valor,
        "img" => $img,
        "categ" => $categ
    ];

    $save = saveData($novoContato, $id);
    header('location: index.php?resp='.$save);
?>