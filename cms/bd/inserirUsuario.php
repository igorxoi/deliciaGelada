<?php

    session_start();

    $nome = (string) "";
    $email = (string) "";
    $senha = (string) "";
    $confSenha = (string) "";
    $sltNivel = (int) 0 ;

    if(isset($_POST['btnCadastrarUsuario'])){

        require_once('../../bd/conexao.php');

        $conexao = conexaoMysql();

        $nome = $_POST['txtNomeCriacaoUsuario'];
        $email = $_POST['txtEmailCriacaoUsuario'];
        $senha = $_POST['txtSenhaCriacaoUsuario'];
        $confSenha = $_POST['txtConfSenhaCriacaoUsuario'];
        $sltNivel = $_POST['slc_niveis_cadastro_usuario'];

        $sql = "select email_usuario from tbl_usuarios where email_usuario ='".$email."'";
       
        $select = mysqli_query($conexao, $sql);

        $autenticador = mysqli_num_rows($select);
        echo($autenticador);

        if($_POST['btnCadastrarUsuario'] == "Enviar"){
            if($autenticador >= 1){
                echo("<script>
                        alert('Este e-mail já está em uso. Tente outro.');
                        window.location.href = '../admUsuarios.php';
                    </script>");
    
            }elseif($senha != $confSenha){
                echo("<script>
                        alert('Essas senhas não coincidem. Tente novamente.');
                        window.location.href = '../admUsuarios.php';
                    </script>");
    
            }elseif($sltNivel == ""){
                echo("<script>
                        alert('Selecione um nível. Tente novamente.');
                        window.location.href = '../admUsuarios.php';
                    </script>");
            }else{
                if($nome != "" && $email != "" && $senha != "" && $confSenha != ""){
                    $sql = "INSERT INTO tbl_usuarios
                            (nome_usuario, email_usuario, senha_usuario, id_nivel, situacao_usuarios)
                             VALUES 
                            ('".$nome."','".$email."','".$senha."','".$sltNivel."','atv')";
                   
                   mysqli_query($conexao, $sql);
                    echo("<script>
                            alert('Usuário criado com sucesso.');
                            window.location.href = '../admUsuarios.php';
                        </script>");
                }else{
                    echo("<script>
                        alert('Preencha os campos e-mail e nome de usuário.');
                        window.location.href = '../admUsuarios.php';
                    </script>");
                }
            }
        }if($_POST['btnCadastrarUsuario'] == "Editar"){
            if($senha != $confSenha){
                echo("<script>
                        alert('Essas senhas não coincidem. Tente novamente.');
                        window.location.href = '../admUsuarios.php';
                    </script>");
            }elseif($nome != "" && $email != ""){
                $sqlEditar = "UPDATE tbl_usuarios set nome_usuario='".$nome."',
                                                      email_usuario='".$email."',
                                                      senha_usuario='".$senha."',
                                                      id_nivel=".$sltNivel." where id_usuario =".$_SESSION['id'];

                mysqli_query($conexao, $sqlEditar);
                echo("<script>
                        alert('Usuario editado com sucesso!');
                        window.location.href = '../admUsuarios.php';
                    </script>");
                    echo($sqlEditar);
            }
        }
        
    }
?>