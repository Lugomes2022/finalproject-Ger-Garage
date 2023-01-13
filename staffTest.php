<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        include_once('Databaseconection.php');
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (substr($email, -11) === "@gerstaff.com") {
            $sql = "SELECT * FROM staff WHERE email = '$email' and password = '$password'";

            $result = $conection->query($sql);

            if(mysqli_num_rows($result) > 1)
            {
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                header('Location: staff.php');
            }
            else
            {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('Location: staff.php');
            }
        }
        else {
            // email address is not valid
            $_SESSION['message'] = "Email is not valid, please try again";
            header('Location: Main.php');
        }
    }
    
?>
