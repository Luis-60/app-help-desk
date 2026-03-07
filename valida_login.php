<?php

session_start();

// variavel que verifica se a autenticacao foi realizada
$usuario_autenticado = false;
$usuario_id = null;

$perfis = array(1 => 'Administrativo', 2 => 'Usuario');
// usuarios do sistema
$usuarios_app = array(
    array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
    array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 2),
    array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 2),
    array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 2),
);

foreach ($usuarios_app as $usuario) {
    if (
        $_POST['email'] == $usuario['email'] &&
        $_POST['senha'] == $usuario['senha']
    ) {
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }
}

if ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = 'NÃO';
    header('Location: index.php?login=erro');
}
