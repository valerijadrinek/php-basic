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
    //Checking the value and type of expressions var_damp();
    //Checking only types- get_debug_type()
    $abool = true;
    $aString = "string";
    $aString2 = 'string2';
    $aInteger = 8;

    echo get_debug_type($abool) .  "\n";
    echo get_debug_type($aString), "\n";
    //if integer, increment by 6
    if(get_debug_type($aInteger) === true) {
        $aInteger += 6;
    }
    var_dump($aInteger);

    //if bool is a string, echo it
    if(is_string($abool)) {
        echo "String : $abool";
    }
    ?>
</body>