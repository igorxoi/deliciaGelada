<?php

    if(isset($_GET['modo'])){
        if($_GET['modo'] == "excluir"){
            //Recebe o id enviado pelo HTML
            $id = $_GET['id'];

            require_once('../../bd/conexao.php');
            $conexao = conexaoMysql();

            //script para ver se tem algum usuario usando esse nivel, se tiver não da para apagar
            $sql = "select * from tbl_usuarios u INNER JOIN tbl_niveis n ON u.id_nivel =".$id;

            // echo($sql);
            $select = mysqli_query($conexao, $sql);

            $autenticador = mysqli_num_rows($select);
            echo($autenticador);

            if($autenticador >= 1){
                echo("<script>
                    alert('O nível está sendo usado por um usuário. Impossivel excluir.');
                    window.location.href = '../admNiveis.php';
                </script>");
            }else{
                // script para deletar o registro
                $sql = "delete from tbl_niveis where id_nivel=".$id;
    
                //executa o script no banco
                mysqli_query($conexao, $sql);
    
                if(mysqli_query($conexao, $sql)){
                    header('location:../admNiveis.php');
                }else{
                    echo("erro ao excluir o registro");
                }
            }
                
            


            
        }
    }

?>