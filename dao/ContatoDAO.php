<?php

require_once 'Database.php';
require_once '../model/Contato.php';


class ContatoDAO 
{
    private $db;

    public function __construct()
    {
        $this->db =  Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM contatos_info";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $contatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array_map(function($contato) {
                return new Contato($contato['id'], $contato['nome'], $contato['telefone'], $contato['email']);
            }, $contatos);
        } catch (PDOException $e) {
            echo $e->getMessage();
    return [];
           
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM contatos_info WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $contato = $stmt->fetch(PDO::FETCH_ASSOC);
            return $contato ? new Contato($contato['id'], $contato['nome'], $contato['telefone'], $contato['email']) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
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