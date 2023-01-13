
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Staff Login</title>
    <style>
        body{
            background-color: #00285f;
            font-family: "Roboto", sans-serif;
            font-size: 100%;
            color: black;
        }
        div{    
            background-color: #f78b00;
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
            background-color: #00285f;;
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
                    background-color: #f78b00;
                    padding: 10px 20px;
                    border-radius: 5px;
                    font-size: 16px;
                    margin-top: 10px;
                    display: inline-block;
                    }
    </style>
</head>

    <div>
        <h1>Staff Login</h1>
        <form action="staffTest.php" method="POST">
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
</body>
</html>