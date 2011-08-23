<?php

/**
 * Classe para upload de imagens
 *
 * @author emerson
 */
class UploadImages {
    
    private $img_nametmp;
    private $img_error = Array();
    private $img_size;
    private $img_type;

    function  __construct($image){
        
        $this->img_size = $image['size'];
        $this->img_nametmp = $image['tmp_name'];
        $this->img_type = $image['type'];
    
    }

    // Efetua o upload da imagem
    public function upload($name, $directory, $width, $height, $size){

        if ($this->img_nametmp == ""){
            $this->img_error[] = "Nenhuma imagem foi selecionada!";
            return $this->img_error;
        }else{

            if($name=="" || $directory=="" || $width=="" || $height=="" || $size==""){
                $this->img_error[] = "Não foi possível realizar o upload, por falta de informações!";
            }

            if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $this->img_type)){
                $this->img_error[] = "Este arquivo não tem um formato válido! A imagem deve ser do tipo jpg, jpeg, bmp, gif ou png.";
            }

            if($this->img_size > $size){
                $this->img_error[] = "O Tamanho do arquivo é muito grande! A imagem deve ser de no máximo " . $size . " bytes.";
            }

            $dimensao = getimagesize($this->nometmp);

            // Verifica a largura
            if($dimensao[0] > $width){
                $this->img_error[] = "A largura da imagem não deve ultrapassar " . $this->width . " pixels";
            }

            // Verifica altura
            if($dimensao[1] > $height){
                $this->img_error[] = "A altura da imagem não deve ultrapassar " . $this->height . " pixels";
            }

            if (count($this->img_error) > 0){
               return $this->img_error;
            }else{
                move_uploaded_file($this->img_nametmp, $directory . $name);
                $this->img_error[] = "O upload foi concluido com sucesso!";
                return $this->img_error;
            }
        }
    }
}
?>
