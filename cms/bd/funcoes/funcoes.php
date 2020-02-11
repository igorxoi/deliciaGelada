<?php

function insercaoImagem($imagemInsercao){

    $imagem = $imagemInsercao;
    $diretorio = (string) "arquivos/"; 
    $tamanhoPermitido = (int) 1000 ;
    $arquivosPermitidos = array("image/jpeg", "image/jpg", "image/png");

    if($imagem['type'] != ""){
        if($imagem['size'] > 0){
            $tipoArquivo = $imagem['type'];

            if(in_array($tipoArquivo, $arquivosPermitidos)){
                $tamanhoArquivo = round($imagem['size'] / 1024);

                if($tamanhoArquivo <= $tamanhoPermitido){

                    $nomeCompletoArquivo = $imagem['name'];
                    $nomeArquivo = pathinfo($nomeCompletoArquivo, PATHINFO_FILENAME);
                    $extArquivo = pathinfo($nomeCompletoArquivo, PATHINFO_EXTENSION);

                    $nomeCrypt = (md5(uniqid(time()).'$nomeArquivo'));
                    $nomeFoto = $nomeCrypt.".".$extArquivo;
                    $arquivoTempo = $imagem['tmp_name'];
                    echo($arquivoTempo);
                    echo($diretorio.$nomeFoto);
                    // return $nomeFoto;

                    if(move_uploaded_file($arquivoTempo, $diretorio.$nomeFoto)){
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


?>