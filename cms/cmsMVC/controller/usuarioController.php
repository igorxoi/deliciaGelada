<?php
/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 01/12/2019
 * Data de modificação:
 * Modificações realizadas:
 */

    class UsuarioController{
        public function __construct(){
            require_once('model/usuarioClass.php');
            require_once('model/DAO/usuarioDAO.php');
        }

        public function autenticar(){

            $usuario = new Usuario();

            $usuario->setUsuario($_POST['txtUsuarioLogin']);
            $usuario->setSenha($_POST['txtUsuarioSenha']);

            $usuarioDAO = new UsuarioDAO();

            if($usuarioDAO->autenticarUsuario($usuario)){
                echo("<script>
                    alert('logado com sucesso');
                    window.location.href = 'index.php';
                </script>");
            }else{
                echo("<script>
                    alert('Usuário ou senha incorreta');
                    window.location.href = 'view/login.php';
                </script>");
            }
        }
    }
?>