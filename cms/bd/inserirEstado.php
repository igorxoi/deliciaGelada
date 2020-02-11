<?php

    if(isset($_GET['btnCriacaoEstado'])){

        require_once('../../bd/conexao.php');

        $conexao = conexaoMysql();
        
        $estado = $_GET['txtNomeEstado'];

        if($estado != ""){
            $sql = "INSERT INTO tbl_estados(nome_estado) VALUES('".$estado."')";

            // echo($sql);
            mysqli_query($conexao, $sql);
            echo("<script>
                    alert('Estado criado.');
                    window.location.href = '../edicaoLojas.php';
                </script>");
            

        }else{
            echo("<script>
                    alert('Por Favor preencha o campo');
                    window.location.href = '../edicaoLojas.php';
                </script>");
                
        }
    }
    

    
?>