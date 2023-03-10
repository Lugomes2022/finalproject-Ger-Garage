

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
        .inputSubmit{
            background-color: #f78b00;;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        .inputSubmit:hover{
            background-color: lightyellow;
            cursor: pointer;
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
    <div>
        <h1>Login</h1>
        <form action="testeLogin.php" method="POST">
            <input type="text"  name= "email" placeholder="Email">
            <br><br>
            <input type="password" name="password" placeholder="password">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enter">
            <br><br>
            <br><br>

        </form> 
    </div>
    <a href="Main.php" class="back-button"> Back to the main page</a>
    <a href="staffLogin.php" class="forward-button"> Staff Login Here</a>
</body>
</html>