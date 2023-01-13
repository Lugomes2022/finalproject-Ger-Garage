<?php
    session_start();

    //print_r($_REQUEST);

     if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        // Acessa
        include_once('Databaseconection.php');
        $email = $_POST['email'];
        $password = $_POST['password'];

        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $password);

        $sql = "SELECT * FROM customer WHERE email = '$email' and password = '$password'";

        $result = $conection->query($sql);

        // print_r($sql);
        // print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            $_SESSION['message'] = "Email is not valid, please try again";
            header('Location: Login.php');
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('Location: booking.php');
        }
    }
    else
    {
        // not allowed
        header('Location: Main.php');
    }
    
?>