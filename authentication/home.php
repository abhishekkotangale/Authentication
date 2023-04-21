<?php

    session_start();

    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>


   <h1>Hii Everyone this is <?php  echo $_SESSION['username']; ?></h1>

</br></br>

    <a href="logout.php">logout</a>
</body>
</html>