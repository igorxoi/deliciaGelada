<?php

    if(isset($_POST)){        

        $diretorio = (string) "arquivos/"; 
        $tamanhoPermitido = (int) 1000 ;
        $arquivosPermitidos = array("image/jpeg", "image/jpg", "image/png");
    
        if($_FILES['fleImagemCuriosidades']['type'] != ""){
            if($_FILES['fleImagemCuriosidades']['size'] > 0){
                $tipoArquivo = $_FILES['fleImagemCuriosidades']['type'];
    
                if(in_array($tipoArquivo, $arquivosPermitidos)){
                    $tamanhoArquivo = round($_FILES['fleImagemCuriosidades']['size'] / 1024);
    
                    if($tamanhoArquivo <= $tamanhoPermitido){
    
                        $nomeCompletoArquivo = $_FILES['fleImagemCuriosidades']['name'];
                        $nomeArquivo = pathinfo($nomeCompletoArquivo, PATHINFO_FILENAME);
                        $extArquivo = pathinfo($nomeCompletoArquivo, PATHINFO_EXTENSION);
    
                        $nomeCrypt = (md5(uniqid(time()).'$nomeArquivo'));
                        $nomeFoto = $nomeCrypt.".".$extArquivo;
                        $arquivoTempo = $_FILES['fleImagemCuriosidades']['tmp_name'];
    
                        if(move_uploaded_file($arquivoTempo, $diretorio.$nomeFoto)){
                            echo("<img class='imgFoto' src='bd/arquivos/".$nomeFoto."'>");
                            session_start();                 
                            $_SESSION['nomeFoto'] = $nomeFoto;                        
                        }else{                                       
                            echo("
                                <script>
                                    alert('Erro ao eviar o arquivo para o servidor');
                                </script>
                            ");
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