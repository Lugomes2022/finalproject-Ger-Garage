<?php
    
   
    if(isset($_POST['email']) || isset($_POST['senha'])) {

        if(strlen($_POST['email']) == 0) {
            echo "Preencha seu e-mail";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        } else {
    
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);
    
            $sql_code = "SELECT * FROM login WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    
            $quantidade = $sql_query->num_rows;
    
            if($quantidade == 1) {
                
                $usuario = $sql_query->fetch_assoc();
    
                if(!isset($_SESSION)) {
                    session_start();
                }
    
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['password'] = $usuario['password'];
    
                header("Location: Main.php");
    
            } else {
                echo "Falha ao logar! E-mail ou senha incorretos";
            }
    
        }
    
    }
   


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Members Login</title>
    <style>
        body{
            background-color: #f78b00;
            font-family: "Roboto", sans-serif;
            font-size: 100%;
            color: black;
        }
        div{
            background-color: #00285f;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        button{
            background-color: #f78b00;;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        button:hover{
            background-color: lightyellow;
            cursor: pointer;
        }
    </style>
</head>

    <div>
        <h1>Login</h1>
        <form action="" method="POST"></form>
            <input type="text"  name= "email" placeholder="Email">
            <br><br>
            <input type="password" name="password" placeholder="password">
            <br><br>
            <button>Submit</button>
            <br><br>
            <br><br>
            <button>   <a href="Main.php">Back to the main page</a> </button>

    </div>
</body>
</html>