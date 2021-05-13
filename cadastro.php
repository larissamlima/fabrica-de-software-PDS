<?php

$senha = MD5($_POST['senha']);
$email = $_POST['email'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
echo $email;
$connect = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connect, 'alfredo');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
} else {
    echo "success mothafocka";
}
// $query_select = "SELECT email FROM usuarios WHERE email = '$email'";
// $select = mysqli_query($connect, $query_select);
// $array = mysqli_fetch_array($select);
// echo $array;
// $emailarr = $array['email'];


if ($email == "" || $email == null) {
    echo "<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.html';</script>";
} else {
    $query = "INSERT INTO usuarios (senha,nome,sobrenome,email) VALUES ('$senha','$nome','$sobrenome','$email')";
    $insert = mysqli_query($connect, $query);

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
