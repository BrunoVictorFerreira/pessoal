<?php
    include('conexao.php');

?>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['enviar-formulario'])):
        //array de erros
        $erros = array();

        //VERIFICAÇÃO DE DADOS INT 
        if(!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)):
            $erros[] = "idade precisa ser um inteiro!";
        endif;

        //VERIFICAÇÃO DE DADOS EMAIL 
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)):
            $erros[] = "O campo email não está correto!";
        endif;

        //VERIFICAÇÃO DE DADOS PESO
        $peso = mysqli_real_escape_string($conn, $_POST['peso']);
        $peso = filter_var($peso, FILTER_SANITIZE_NUMBER_FLOAT);
        if(!$peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT)):
            $erros[] = "O valor de peso esta errado!";
        endif;

        //VERIFICAÇÃO DE DADOS IP
        $ip = mysqli_real_escape_string($conn, $_POST['ip']);
        if(!$ip = filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP)):
            $erros[] = "IP INCORRETO!";
        endif;

        //VERIFICAÇÃO DE DADOS URL
        $url = mysqli_Real_escape_string($conn, $_POST['url']);
        $url = filter_var($url, FILTER_SANITIZE_URL);
        if(!$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL)){
            $erros[] = "url incorreta!";
        }
        


        if(!empty($erros)):
            foreach($erros as $erro):
                echo "<li> $erro </li>";
            endforeach;
        else:
            echo "Parabens, seus dados estao corretos!";
        endif;
        
    endif;
    

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    idade:<input type="text" name="idade" placeholder="Idade"><br>
    Email:<input type="text" name="email" placeholder="email"><br>
    Peso:<input type="text" name="peso" placeholder="Peso"><br>
    IP:<input type="text" name="ip" placeholder="Ip"><br>
    URL:<input type="text" name="url" placeholder="url"><br>
    <input type="submit" name="enviar-formulario" value="Submit">
    </form>
</body>
</html>