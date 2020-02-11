<?php

    if(isset($_GET['modo'])){
        if($_GET['modo'] == "excluir"){
            //Recebe o id enviado pelo HTML
            $id = $_GET['id'];

            require_once('../../bd/conexao.php');
            $conexao = conexaoMysql();
            
            // script para deletar o registro
            $sql = "delete from tbl_usuarios where id_usuario=".$id;

            //executa o script no banco
            mysqli_query($conexao, $sql);

            if(mysqli_query($conexao, $sql)){
                header('location:../admUsuarios.php');
            }else{
                echo("erro ao excluir o registro");

            }        
        }
    }

?>