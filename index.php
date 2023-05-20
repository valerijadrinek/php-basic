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
    <!-- Header -->
    <header>Welcome PHP handled FORMS</header>
    <h4><?php 
     echo date("d/m/Y") . " , " . date("l"); ?>
     </h4>

    <h4><?php 
    date_default_timezone_set("Europe/Zagreb"); 
    echo "The time is " . date("H:i:s"); ?>
    </h4>

    <?php 
    //define variables
    $nameErr = $emailErr = $websiteErr = $genderErr = "";
    $name = $email = $website = $comment = $gender = "";

    //determine values for variables depending on post method


    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST["name"])) {
            $nameErr = "Name is reguired!";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
             if (!preg_match("/^[a-zA-Z-' ]*$/i",$name)) {
                 $nameErr = "Only letters and white space allowed";
                  }
        }

        if(empty($_POST["email"])) {
            $emailErr = "Email is reguired!";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                }
        }
        
        if(empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
             // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
             $regWeb = '/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i';
             //$regWeb2 = '/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/i';
             //$regWeb3 = "/^https?:\\/\\/(?:www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b(?:[-a-zA-Z0-9()@:%_\\+.~#?&\\/=]*)$/i";
             if (!preg_match( $regWeb, $website)) {
              $websiteErr = "Invalid URL";
              }
        }

        if(empty($_POST["gender"])) {
            $genderErr = "Gender is reguired!";
        } else {
            $gender = test_input($_POST["gender"]);
        }

       if(empty($_POST["comment"])) {
         $comment = "";
       } else {
        $comment = test_input($_POST["comment"]);
       }
        
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <label for="name">Name: <span class="error"> * <?php echo $nameErr;?></span></label>
        <input type="text" name="name" value="<?php echo $name; ?>"/><br>
        <label for="email">E-mail: <span class="error"> * <?php echo $emailErr;?></span></label>
        <input type="email" name="email" value="<?php echo $email; ?>"/> <br>
        <label for="website">Website:  <span class="error"> * <?php echo $websiteErr;?></span></label>
        <input type="text" name="website" value="<?php echo $website; ?>"/><br>
        <label for="comment">Comment:</label>
        <textarea name="comment" rows="6" cols="100" placeholder="Write your comment here..."><?php echo $comment;?></textarea><br>
        <div>
            <label for="gender">Gender:  <span class="error"> * <?php echo $genderErr;?></span></label><br>
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female" />Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked"; ?> value="male" />Male
            <input type="radio" name="gender" <?php  if (isset($gender) && $gender=="other") echo "checked"; ?> value="other" />Other
            <br>  
        </div>

        <input type="submit" value="Pošalji" />
      
    </form>

    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2> Your input: </h2>";

    echo "<p>Your name is <span>$name</span>. </p><br>";
    echo "<p>Your email is <span>$email</span>. </p><br>";
    echo "<p>Your website is <span>$website</span>. </p><br>";
    echo "<p>Your comment us <span>$comment</span></p><br>";
    echo "<p>Your gender is <span>$gender</span>. </p><br>";
    }
    
    ?>
</body>