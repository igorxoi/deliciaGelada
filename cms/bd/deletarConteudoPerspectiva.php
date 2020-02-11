<?php

    if(isset($_GET['modo'])){
        if($_GET['modo'] == "excluir"){
            $codigo = $_GET['codigo'];
            
            $nomeFoto1 = $_GET['nomeFoto1'];
            $nomeFoto2 = $_GET['nomeFoto2'];
            $nomeFoto3 = $_GET['nomeFoto3'];

            $sql = "delete from tbl_sobre_perspectiva where id_sobre_perspectiva=".$codigo;
            echo($sql);

            require_once('../../bd/conexao.php');
            $conexao = conexaoMysql();

            mysqli_query($conexao, $sql);

            if(mysqli_query($conexao, $sql)){
                unlink('arquivos/'.$nomeFoto1);
                unlink('arquivos/'.$nomeFoto2);
                unlink('arquivos/'.$nomeFoto3);
                header('location:../edicaoConteudoSobre.php');
            }else{
                echo("erro ao excluir o registro");
            }
        }
    }

?>