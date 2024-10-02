<?php

//Criar a classe

//Criar proriedades existentes na entidade do Banco de Dados

//Criar método construtor com as propriedaes obrigatórias a um usuário

//Criar getters e setters

//Opcionalmente, criar o ToString() da classe

class Usuario{

    private $id;
    private $nome;
    private $senha;
    private $email;
    private $token;

    public function __construct($id, $nome, $senha, $email, $token){
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->email = $email;
        $this->token = $token;
    }

    public function getId(){
      return $this->id;
    }
    public function getNome(){
       return $this->nome;
    }
    public function getSenha(){
       return $this->senha;
    }
    public function getEmail(){
       return $this->email;
    }
    public function getToken(){
       return  $this->token;
    }

    public function setId($id){
         $this->id = $id;
      }
      public function setNome($nome){
         $this->nome = $nome;
      }
      public function setSenha($senha){
         $this->senha = $senha;
      }
      public function setEmail($email){
         $this->email = $email;
      }
      public function setToken($token){
      $this->token = $token;
      }


    public function __toString(){
        return "Nome: {$this->nome}, Senha: {$this->senha}, Email: {$this->email}, Token: {$this->token}";
    }
}

?>