<?php
   //connect to the database
    $conection = mysqli_connect('localhost', 'root', '', 'gergarage');
    if (!$conection) {
        die('Error: ' . mysqli_connect_error());
    }

    $slq = "SELECT * FROM bookings ORDER BY booking_date ASC LIMIT 100";
    //perform the query
    $result = mysqli_query($conection, $slq);

    if(!$result){
      die('Error: '. mysqli_error($conection));
    }

?>

<html>
  <head>
    <title>Staff Overview</title>
    <style>
      body{
            background-color: #f78b00;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 100%;
            color: black;
            }
      /* Style the menu container */
      #menu {
        width: 200px;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        background-color: #00285f;
        color: #fff;
      }
      /* Style the menu items */
      #menu a {
        display: block;
        padding: 20px;
        text-decoration: none;
        color: #fff;
      }
      /* Change the color of the menu items on hover */
      #menu a:hover {
        background-color: #444;
      }
      /* Style the main content container */
      
      #main {
              float: right;
              width: 80%;
             }
      .table-bg {
                background: #00285f;
                color:#fff;
                text-align: center;
                border-radius: 10px 10px 0 0;


      }

    </style>

  </head>
  <body>
    <!-- Menu container -->
    <div id="menu">
      <a href="Main.php">Home</a>
      <a href="#">Bookings</a>
      <a href="#">Mechanics</a>
      <a href="#">Invoices</a>
      <a href="staffLogin.php">Logout</a>
    </div>
    <!-- Main content container -->
    <div id="main">
      <h1>Staff Overview</h1>
      <table class="table text-white table-bg">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Make</th>
      <th scope="col">License</th>
      <th scope="col">Engine</th>
      <th scope="col">Type</th>
      <th scope="col">Booking_date</th>
      <th scope="col">Booking_type</th>
      <th scope="col">Comments</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
        <?php
              while($user_data= mysqli_fetch_assoc($result))
              {
                echo "<tr>";
                echo "<td>".$user_data ['booking_id']."</td>";
                echo "<td>".$user_data ['name']."</td>";
                echo "<td>".$user_data ['phone']."</td>";
                echo "<td>".$user_data ['make']."</td>";
                echo "<td>".$user_data ['licence']."</td>";
                echo "<td>".$user_data ['engine']."</td>";
                echo "<td>".$user_data ['type']."</td>";
                echo "<td>".$user_data ['booking_date']."</td>";
                echo "<td>".$user_data ['booking_type']."</td>";
                echo "<td>".$user_data ['comments']."</td>";
                echo "</tr>";
                }
                mysqli_close($conection);
                ?>
                
               </tbody>
                </table>
                  </body>
                </html>
