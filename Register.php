<?php

    if(isset($_POST['submit'])){    

    include_once('Databaseconection.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    
    $result = mysqli_query($conection, "INSERT INTO customer(name,email,password,phone)
    VALUES  ('$name','$email','$password','$phone')");

    if (!$result) {
    die('Error: ' . mysqli_error($conection));

    }else{
        
    // close database connection
    mysqli_close($conection);

    echo "<div class='success-message'>Thanks for registering with us.Please use your email and password to login</div>";

    }
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's get started</title>
    <style>
        .success-message {
                          padding: 20px;
                          background-color: #d9ffcc;
                          border-radius: 10px;
                          text-align: center;
                          font-size: 18px;
                          font-weight: bold;
                          animation: success-animation 2s ease-in-out;
                        }

        @keyframes success-animation {
                                        from {opacity: 0;}
                                        to {opacity: 1;}
                                    }

        body{
            background-color: #f78b00;
            font-family: "Roboto", sans-serif;
            font-size: 100%;
            color: black;
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
        .back-button{
                    text-decoration: none;
                    color: white;
                    background-color: #00285f;
                    padding: 10px 20px;
                    border-radius: 5px;
                    font-size: 16px;
                    margin-top: 10px;
                    display: inline-block;
                    }
        .forward-button{
                    text-decoration: none;
                    color: white;
                    background-color: #00285f;
                    padding: 10px 20px;
                    border-radius: 5px;
                    font-size: 16px;
                    margin-top: 10px;
                    float: right;
                    }
    </style>
</head> 
<body>
    <div class="box">
        <form action="Register.php" method="post">
            <fieldset>
                <legend><b>Customer Registration Form</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="name" id="name" class="inputUser" required>
                    <label for="name" class="labelInput">Full Name</label>
                </div>
                <br><br>
                
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>  
                <br><br>
                <div class="inputBox">
                    <input type="text" name="password" id="password" class="inputUser" required>
                    <label for="text" class="labelInput">Password</label>
                <br><br>
                <div class="inputBox">
                    <input type="phone" name="phone" id="phone" class="inputUser" required>
                    <label for="phone" class="labelInput">Phone Number</label>
            
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
    <a href="Main.php" class="back-button"> Back to the main page</a>
    <a href="Login.php" class="forward-button"> Go to Login Page</a>
</body>
</html> 