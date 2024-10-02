<?php

require_once '../dao/Database.php';
require_once '../model/Usuario.php';

class UsuarioDAO{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }
    public function create($usuario){
        try{
            $sql = "INSERT INTO usuario (nome, senha, email, token) 
            VALUES (:nome, :senha, :email, :token)";
            $stmt = $this->db->prepare($sql);

            $stmt->execute([':nome' => $usuario->getNome(),
            ':senha' => $usuario->getSenha(),
            ':email' => $usuario->getEmail(),
            ':token' => $usuario->getToken()
        ]);

            return true;

        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}

?>