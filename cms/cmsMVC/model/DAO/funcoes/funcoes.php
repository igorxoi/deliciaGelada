<?php

/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 04/12/2019
 * Data de modificação: 
 * Modificações realizadas: 
 */

class Funcao{

    private $imagem;
    private $diretorio;
    private $tamanhoPermitido;
    private $arquivosPermitidos;

    public function __construct(){
        require_once('controller/produtoController.php');

        $this->diretorio = "model/DAO/arquivos/";
        $this->tamanhoPermitido = 1000;
        $this->arquivosPermitidos = array("image/jpeg", "image/jpg", "image/png");
    }

    public function insercaoImagem($imagemInsercao){

        $this->imagem = $imagemInsercao;

        if($this->imagem['type'] != ""){
            if($this->imagem['size'] > 0){
                $tipoArquivo = $this->imagem['type'];
    
                if(in_array($tipoArquivo, $this->arquivosPermitidos)){
                    $tamanhoArquivo = round($this->imagem['size'] / 1024);
    
                    if($tamanhoArquivo <= $this->tamanhoPermitido){
    
                        $nomeCompletoArquivo = $this->imagem['name'];
                        $nomeArquivo = pathinfo($nomeCompletoArquivo, PATHINFO_FILENAME);
                        $extArquivo = pathinfo($nomeCompletoArquivo, PATHINFO_EXTENSION);
    
                        $nomeCrypt = (md5(uniqid(time()).'$nomeArquivo'));
                        $nomeFoto = $nomeCrypt.".".$extArquivo;
                        $arquivoTempo = $this->imagem['tmp_name'];
                        echo($arquivoTempo);
                        echo($this->diretorio.$nomeFoto);
    
                        if(move_uploaded_file($arquivoTempo, $this->diretorio.$nomeFoto)){
                            return $nomeFoto;
                        }
                        
    
                    }else{
                        echo("
                            <script>
                                alert('O arquivo selecionado é maior do que o tamanho permitido(1MB)');
                            </script>
                        ");  
                    }
    
                }else{
                    echo("
                        <script>
                            alert('O arquivo selecionado não é permitido');
                        </script>
                    ");                 
                }
    
            }else{
                echo("
                    <script>
                        alert('O arquivo selecionado não é permitido');
                    </script>
                "); 
            }
    
        }else{
            echo("
                <script>
                    alert('Selecione uma imagem');
                </script>
            "); 
        }
    }
    
}

?>