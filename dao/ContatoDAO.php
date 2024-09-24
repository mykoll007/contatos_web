<?php

require_once 'Database.php';

class ContatoDAO 
{
    private $db;

    public function __construct()
    {
        $this->db =  Database::getInstance()->getConnection();
    }

    public function getAll()
    {

    }

    public function getById($id)
    {
        
    }

    public function create($contato)
    {
        try {
            $sql = "INSERT INTO contatos_info (nome, telefone, email)
                    VALUES (:nome, :telefone, :email)";
            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                ':nome' => $contato->getNome(),
                ':telefone' => $contato->getTelefone(),
                ':email' => $contato->getEmail()
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update($contato)
    {

    }

    public function delete($id)
    {

    }
}

?>