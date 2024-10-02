<?php

require_once '../model/Usuario.php';
require_once '../dao/UsuarioDAO.php';

$type = filter_input(INPUT_POST, "type");

switch($type) 
{
    case "register":
        handlerRegistration();
        break;
    default:
        echo "Ação inválida";
        break;
}


function handlerRegistration(){
    // Receber os dados vindos por input do HTML
    $nome = filter_input(INPUT_POST, "new_nome");
    $email = filter_input(INPUT_POST, "new_email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "new_password");
    $confirm_password = filter_input(INPUT_POST, "confirm_password");

    // Verificar os dados informados
    if(!$email || !$nome || !$password){
        echo "Dados de input inválidos";
        return;
    }

    if($password !== $confirm_password){
        echo "Senhas não correspondem.";
        return;
    }

    // Etapa de segurança: criação da senha segura e geração do token
    // Criação do Usuário no Banco de Dados
    $usuario = new Usuario(null, $nome, $password, $email, null);
    $usuarioDAO = new UsuarioDAO();

    $usuarioDAO->create($usuario);
    // Redirecionar para a página do index
}

?>