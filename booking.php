<?php
    session_start();
    include_once('Databaseconection.php');
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: Login.php');
    }
    $logok = $_SESSION['email'];
    if(!empty($_GET['search'])) 
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM customer WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM customer ORDER BY id DESC";
    }
    $result = $conection->query($sql);

    if (isset($_POST['submit'])) {
        // check the selected date
        $selected_date = $_POST['booking_date'];
        $ts = strtotime($selected_date);
        $day = date("l", $ts);

        // check if it's Sunday
        if ($day == "Sunday") {
            echo "<div class='sunday-message'>Sorry, Ger's Garage are closed on Sundays, please try another date.</div>";
        } else {
            // get form data
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $make = $_POST['make'];
            $licence = $_POST['licence'];
            $engine = $_POST['engine'];
            $type = $_POST['type'];
            $booking_date = $_POST['booking_date'];
            $booking_type = $_POST['booking_type'];
            $comments = $_POST['comments'];
        
        
            // insert data into bookings table
            $result2 = mysqli_query($conection, "INSERT INTO bookings(name, phone,make, licence, engine, type, booking_date, booking_type, comments) 
            VALUES ('$name', '$phone', '$make', '$licence', '$engine', '$type', '$booking_date','$booking_type', '$comments')");
        
            // check for query errors
            if (!$result2) {
                die('Error: ' . mysqli_error($conection));

        }else{

        // close database connection
        mysqli_close($conection);

        echo "<div class='booking-message'>Thanks for your booking. We will get back to you shortly</div>";

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
    <title>Booking System</title>
</div>

    <style>
        .sunday-message {
                          padding: 20px;
                          background-color: red;
                          border-radius: 10px;
                          text-align: center;
                          font-size: 18px;
                          font-weight: bold;
                          animation: success-animation 2s ease-in-out;
                        }
        .booking-message {
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

        .left-bg {
                  background-image: url('https://www.courses.ie/wp-content/uploads/2018/05/shutterstock_399175633.jpg');
                  background-repeat: no-repeat;
                  background-size: cover;
                  float: left;
                  width: 50%;
                  height: 100%;
                  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                  font-size: 100%;
                  color: white;
                 }
        body{
            background-color: #f78b00;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 100%;
            color: black;
            }
        .form-container {
                        float: right;
                        width: 50%;
                        }

        form {
             display: flex;
             flex-direction: column;
             }

        form input,
        form textarea,
        form select {
                    width: 100%;
                    margin-bottom: 1rem;
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

        #menu a {
        display: block;
        padding: 30px;
        text-decoration: lawngreen;
        color: black;
        font-size: x-large;
        cursor: pointer;
        font: bold;
        font-family: Georgia, 'Times New Roman', Times, serif;

      }
    /* Center the success message on the screen */
    .success-message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
    }
    /* Add some custom styling to the message */
    .success-message span {
        background-color: #3cb371;
        color: white;
        padding: 20px;
        border-radius: 5px;
        display: inline-block;
    }
    .welcome-message {
                          padding: 20px;
                          background-color: darkblue;
                          border-radius: 10px;
                          text-align: center;
                          font-size: 18px;
                          font-weight: bold;
                        }
    </style>
    
</head>
<div class="left-bg">
    <?php
        echo "<div class='welcome-message' <u>Welcome back $logok</u></div>";
    ?>

<div id="menu">
      <a href="Main.php">Home</a> <br><br>
      <a href="#">My Bookings</a> <br><br>
      <a href="#">My Invoices</a> <br><br><br>
      <a href="Main.php">Logout</a> <br><br>
    </div>
</div>
   
        <div class="form-container">

        <form action="booking.php" method="post">
            <fieldset>
                <legend><b>Please use the form below to book a service or repair for your vehicle</b></legend>
                <br>
                <div class="inputBox">
                   
                    <label  for="labelInput">Select the desire date for your booking</label><br>
                   <input type="date" name="booking_date" id="booking_date"  min="2023-01-16" max="2023-12-30" required><br>       
                
                    
                </div>
                
                <div class="inputBox">
                    <label for="type">Type of Booking:</label><br>
                    <select name="booking_type">
                    <option value="annual_service">Annual Service</option>
                    <option value="major_service">Major Service</option>
                    <option value="repair_fault">Repair / Fault</option>
                    <option value="major_repair">Major Repair</option>
                    </select><br>
                </div>
                <div class="inputBox">
                        <label for="name">Name:</label><br>
                        <input type="text" id="name" name="name" required><br>
                
                <div class="inputBox">
                    <label for="phone" >Phone Number</label>
                    <input type="phone" name="phone" id="phone"  required>

                <h4>Vehicle Details:</h4>
                <label for="make">Make:</label><br>
                <select id="make" name="make">  
                    <option value="Ford">Ford</option>
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Honda">Honda</option>
                    <option value="Mazda">Mazda</option>
                    <option value="Hyundai">Hyundai</option>
                    <option value="Kia">Kia</option>
                    <option value="Subaru">Subaru</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Mitsubishi">Mitsubishi</option>
                    <option value="Daihatsu">Daihatsu</option>
                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                    <option value="BMW">BMW</option>
                    <option value="Audi">Audi</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Porsche">Porsche</option>
                    <option value="Peugeot">Peugeot</option>
                    <option value="Citroen">Citroen</option>
                    <option value="Renault">Renault</option>
                    <option value="Volvo">Volvo</option>
                    <option value="Saab">Saab</option>
                    <option value="Fiat">Fiat</option>
                    <option value="Alfa Romeo">Alfa Romeo</option>
                    <option value="Lancia">Lancia</option>
                    <option value="Jaguar">Jaguar</option>
                    <option value="Land Rover">Land Rover</option>
                    <option value="Mini">Mini</option>
                    <option value="Vauxhall">Vauxhall</option>
                    <option value="Opel">Opel</option>
                    <option value="Acura">Acura</option>
                    <option value="Infiniti">Infiniti</option>
                    <option value="Lexus">Lexus</option>
                    <option value="Maserati">Maserati</option>
                    <option value="McLaren">McLaren</option>
                    <option value="Bentley">Bentley</option>
                    <option value="Bugatti">Bugatti</option>
                    <option value="Lamborghini">Lamborghini</option>
                    <option value="Other">Other</option>
                </select>

                <label for="type">Vehicle Type:</label><br>
                <select id="type" name="type">
                    <option value="Motorbike">Motorbike</option>
                    <option value="Cars">Cars</option>
                    <option value="Small Vans">Small Vans</option>
                    <option value="Small Buses">Small Buses</option>
                </select>
                <label for="licence">Licence:</label><br>
                <input type="text" id="licence" name="licence" required><br>
                <label for="engine">Engine Type:</label><br>
                <select id="engine" name="engine">
                <option value="diesel">Diesel</option>
                <option value="petrol">Petrol</option>
                <option value="hybrid">Hybrid</option>
                <option value="electric">Electric</option>
                </select><br>
                <label for="comments">Comments:</label><br>
                <textarea id="comments" name="comments"></textarea><br>
            
                <input type="submit" name="submit" id="submit" value="Book Now">
            </fieldset>
        </form>
    
       
</html>