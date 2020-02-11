<?php

/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 01/12/2019
 * Data de modificação:
 * Modificações realizadas:
 */

    class UsuarioDAO{

        private $conexaoMysql;
        private $conexao;

        public function __construct(){

            // Importa o arquivo de conexao com o Mysql
            require_once('conexaoMysql.php');

            // Instancia do objeto de conexao com o Mysql
            $this->conexaoMysql = new conexaoMysql();

            // Abre a conexao com o Banco de Dados
            $this->conexao = $this->conexaoMysql->connectDatabase();
        }

        public function autenticarUsuario(Usuario $usuario){
            $sql = "select u.nome_usuario, n.adm_usuario, n.adm_contato, n.adm_conteudo from tbl_usuarios u INNER JOIN tbl_niveis n ON u.id_nivel = n.id_nivel 
            where u.email_usuario = '".$usuario->getUsuario()."' AND u.senha_usuario = '".$usuario->getSenha()."' AND u.situacao_usuarios = 'atv' AND n.situacao_nivel = 'atv'";

            $select = $this->conexao->query($sql);

            if($select->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }
    }
    
?>