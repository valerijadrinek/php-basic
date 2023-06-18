<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Forms with php</title>
    <link rel="icon" type="image/png" href="./assets/favicon-32x32.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
       $servername = "localhost";
       $username = "username";
       $password = "password";
       
       //Create connection
       $con = new mysqli($servername, $username, $password);


       //Check connection
       if ($con->connect_error) {
          die ("Connection failed " . $con->connect_error);
       }

       //Create DB
       $sql = "CREATE DATABASE myDB";

       //Check creating DB
       if ($con->query($sql) === TRUE) {
        echo "Database created successfully!";
       } else {
        echo "Error creating database " . $con->error;
       }

       $con->close();
    ?>
</body>