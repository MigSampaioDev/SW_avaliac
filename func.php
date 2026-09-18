<?php
    function readData(String $arquivo):array
    {
        $dados = [];
        if(file_exists($arquivo))
        {
            $extrair = file_get_contents($arquivo);
            $dados = json_decode($extrair, true);
        }
        return $dados;
    }

    function saveData(array $novoContato, $id):String
    {
        $resp = "";
        $dados = readData("dados.json");

        if($id >= 0)
        {
            $resp = "Atualizado!";
            $dados[$id] = $novoContato;
        } else {
            $msg = "Cadastrado!";
            $dados[] = $novoContato;
        }

        $check = file_put_contents("dados.json", json_encode($dados));

        if($check)
        {
            return $resp;
        } else {
            return "Erro! Falha no salvamento!";
        }
    }
?>