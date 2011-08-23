<?php

require_once "UploadImages.class.php";

$diretorio = 'imagens/';

//Instancia do Objeto
$ul = new UploadImages($_FILES["foto"]);

/*
Chama metodo para upload passando um nome para o arquivo, diretorio em que sera salvo, largura maxima aceita, altura maxima aceita e tamanho maximo aceito.
*/
$retorno = $ul->upload("arquivo.jpg", $diretorio, 629, 229, (1024*1024)); 

//Verifica e mostra na tela o resultado do upload
if (is_array($retorno)){
    if (count($retorno) > 0){
        for ($i=0; $i<count($retorno); $i++){
            echo $retorno[$i]."<br>";

        }
    }
}

?>
