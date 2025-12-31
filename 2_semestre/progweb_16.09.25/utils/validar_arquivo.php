<?php
function validarArquivo($arquivo){
    // //A tag name é referente ao nome original do arquivo
    // $_FILES["name"];
    // //Tamanho em Bytes
    // $_FILES["size"];
    // //MIME TYPE
    // $_FILES["type"];
    $tamanhoArquivo = $arquivo["size"];
    $tamanhoMaximo = 5 * 1024 * 1024;
    $tipoArquivo = explode("/", $arquivo["type"])[0];

    if($tamanhoMaximo < $tamanhoArquivo){
        return "O arquivo extrapola o limite de 5MB";
    }
    else if ($tipoArquivo != "image"){
        return "O arquivo deve ser uma imagem";
    } else {
        return null;
    }

}