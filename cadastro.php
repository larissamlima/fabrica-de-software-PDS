<?php

$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$email = $_POST['email'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$connect = mysqli_connect('localhost', 'admin', 'senha');
$db = mysqli_select_db($con, $dbname);
$query_select = "SELECT login FROM usuarios WHERE login = '$login'";
$select = mysqli_query($query_select, $connect);
$array = mysqli_fetch_array($select);
$logarray = $array['login'];

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if ($login == "" || $login == null) {
    echo "<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.html';</script>";
} else {
    if ($logarray == $login) {

        echo "<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='
        cadastro.html';</script>";
        die();
    } else {
        $query = "INSERT INTO usuarios (login,senha,nome,sobrenome,email) VALUES ('$login','$senha','$nome','$sobrenome','$email')";
        $insert = mysqli_query($query, $connect);

        if ($insert) {
            echo "<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='login.html'</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.html'</script>";
        }
    }
}
