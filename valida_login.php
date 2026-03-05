<?php

session_start();

// variavel que verifica se a autenticacao foi realizada
$usuario_autenticado = false;

// usuarios do sistema
$usuarios_app = array(
    array('email' => 'adm@teste.com.br', 'senha' => '123456'),
    array('email' => 'user@teste.com.br', 'senha' => 'abcd'),
);

foreach ($usuarios_app as $usuario) {
    if (
        $_POST['email'] == $usuario['email'] &&
        $_POST['senha'] == $usuario['senha']
    ) {
        $usuario_autenticado = true;
    }
}

if ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = 'NÃO';
    header('Location: index.php?login=erro');
}
