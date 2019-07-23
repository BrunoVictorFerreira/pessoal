<?php
    include("conexao.php");

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $sobrenome = mysqli_real_escape_string($conn, $_POST['sobrenome']);

    $query = "INSERT INTO cadastro (nome,sobrenome) values ('$nome','$sobrenome');";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Cadastrado com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro de cadastro!');</script>";
    }


?>