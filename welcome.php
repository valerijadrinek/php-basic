
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Forms with php</title>
    <link rel="icon" type="image/png" href="./assets/favicon-32x32.png">
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div>
            <h3>Welcome <span><?php echo $_POST["name"]; ?></span>!</h3>
            <h3>Your e-mail address is <span><?php  echo $_POST["email"];?></span>!</h3>

        </div>
    </body>
</html>