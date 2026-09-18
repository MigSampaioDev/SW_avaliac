<?php
include_once "func.php";

$id = $_GET['id'] ?? '';

if($id == '')
{
    header('location: index.php?resp=Id Inválido!');
    exit;
}
$dados = readData("dados.json");

foreach($dados as $indice => $valor)
{
    if($indice == $id)
    {
        $resp = $valor['nome'].' apagado!';
        unset($valor[$indice]);
    }
    $check = file_put_contents("dados.json", json_encode($dados));
}
?>