<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
 

    <?php 

    include 'connection.php';

    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($con , $_POST['username']);
        $email = mysqli_real_escape_string($con , $_POST['email']);
        $mobile = mysqli_real_escape_string($con , $_POST['mobile']);
        $password = mysqli_real_escape_string($con , $_POST['password']);
        $cpassword = mysqli_real_escape_string($con , $_POST['cpassword']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $token = bin2hex(random_bytes(15));

        $emailquery = "select * from registration where email='$email' ";
        $query = mysqli_query($con,$emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount > 0){
            echo "email exist";
        }else{
            if($password === $cpassword){
                $insertquery = " insert into registration (username , email , mobile , pass , cpass, token, status) values('$username','$email','$mobile','$pass','$cpass','$token','inactive') ";
                $iquery = mysqli_query($con,$insertquery);

                if($iquery){
                    ?>
                    
                    <script>
                        alert("inserted Successful");
                    </script>
                    
                    <?php
                }else{
                    ?>
                    
                <script>
                    alert("not inserted");
                </script>
                
                <?php
                }
            }else{
                echo "password not match";
            }
        }

        

    }

    ?>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="text" name="username" placeholder="username" required>
</br>
        <input type="email" name="email" placeholder="email" required>
        </br>
        <input type="number" name="mobile" placeholder="mobile" required>
        </br>
        <input type="password" name="password" placeholder="pass" required>
        </br>
        <input type="password" name="cpassword" placeholder="cpass" required>
</br>
<button  type="submit" name="submit">Submit</button>

    <div>
        <p>already registered   <a href="login.php">Click here</a>
        </p>
    </div>
    </form>
</body>
</html>