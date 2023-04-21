<?php

    session_start();


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>


    <?php 

    include 'connection.php';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];


        $email_search = "select * from registration where email = '$email'";
        $query = mysqli_query($con , $email_search);

        $email_count = mysqli_num_rows($query);

        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);

            $db_pass = $email_pass['pass'];

            $_SESSION['username'] = $email_pass['username'];

            $pass_decode = password_verify($password,$db_pass);

            if($pass_decode){
                echo "login Successfull";

                ?>
                    <script>location.replace("home.php");</script>

                <?php
            }else{
                echo "password not match";
            }
        }else{
            echo "email incorrect";
        }
    }

    



    ?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="email" name="email" placeholder="email" required>
</br>
       
        <input type="password" name="password" placeholder="pass" required>
        
</br>
<button  type="submit" name="submit">Submit</button>

    <div>
        <p>Dont have account  <a href="regis.php">Click here</a>
        </p>
    </div>
    </form>

</body>
</html>