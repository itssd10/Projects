<?php
    $insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" .
        mysqli_connect_error());
    }
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    //echo $sql;

    if($con->query($sql) == true){
        //echo "Successfully inserted";
        $insert = true;
        
    }
    else{
        echo "Error:  $sql <br> $con->error";
    }

    $con->close();
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Hand:wght@400..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class= "bg" src="GNIT.jpg" alt="GNIT">
    <div class="container">
        <h1>Welcome to GNIT Sodepur UK Trip form</h1>
        <p>Enter your details and submit this form to confirm your 
            participation in the trip</p>
            <?php
            if($insert == true){
            echo "<p class='submsg'>Thanks for submitting your form. We are happy to see you joining us for the UK Trip</p>";
            }
            ?>
            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="text" name="age" id="age" placeholder="Enter your age">
                <input type="gender" name="gender" id="gender" placeholder="Enter your gender">
                <input type="email" name="email" id="email" placeholder="Enter your email">
                <input type="number" name="phone" id="phone" placeholder="Enter you phone">
                <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
                <button class="btn">Submit</button>
               </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
