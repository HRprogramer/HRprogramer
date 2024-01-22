<?php 

session_start();

$error = array(
    'user' =>'',
    'password' => '',
    'email' => '',
    'total' => ''
);

if(isset($_POST['submit'])){

    ////USER////
    if (empty($_POST['user'])){
        $error['user'] = '<p>Username field required</p>';
    }
    else {
        $user = $_POST['user'];
        $pattern = "/^[a-zA-Z\s\w]+$/";
        if (!preg_match($pattern, $user)){
            $error['user'] = '<p>Username must be just alpha numeric characters</p>';
        }
    }

    ////PASSWORD////
    if(empty($_POST['pass'])){
        $error['pass'] ='<p>Password field required</p>';
    }
    else{
        if(empty($_POST['pass1'])){
            $error['password'] = '<p>Confirm Password field required</p>';
        }
        else{
            $pass = $_POST['pass'];
            $pass1 = $_POST['pass1'];
            if($pass != $pass1){
                $error['password'] = '<p>Password must be matched</p>'; 
            }
        }
    }

    ////EMAIL////
    if(empty($_POST['email'])){
        $error['email'] = '<p>Email field required</p>';
    }
    else{
        $email = $_POST['email'];
        if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
            $error['email'] = '<p>Email must be in a correct form</p>';
        }
    }


    ////ERROR////
    if (array_filter($error)){
        $error['total'] = 'There are some errors in your form';
    }
    else{
        $conn = mysqli_connect('localhost' , 'PortfolioSQL' , 'Donava90' , 'portfoliodb');
        if($conn){

            // Inserting data into database
            $sql = "INSERT INTO info (Username , Password , Email) VALUES('$user', '$pass', '$email')";
            $result = mysqli_query($conn, $sql);

            if($result){
                //mysqli_free_result($result);
                mysqli_close($conn);
                header('Location: login.php');
            }
            else{
                $error['total'] = 'There are some errors in inserting data into databse';
            }
        }

    }

}
?>
<?php require('./header-log&sign.php'); ?>

<section class="signup">
    <main>
        <div class="signup-img">

        </div>
        <div class="signup-content">

            <nav class="nav-1">
                <h2>Hey There<b><i>!</i></b></h2>
                <span>Join our friendly group<b><i>!</i></b></span>
            </nav>

            <div class="signup-form">
                <form action="" method="post">

                    <label for="name">
                        <?php echo $error['user']; ?>
                        <input type="text" name="user" placeholder="User name">
                    </label>

                    <label for="password">
                        <?php echo $error['password']; ?>
                        <input type="password" name="pass" placeholder="password">
                    </label>
                    
                    <label for="password">
                        <?php echo $error['password']; ?>
                        <input type="password" name="pass1" placeholder="Confirm Password">
                    </label>

                    <label for="email">
                        <?php echo $error['email']; ?>
                        <input type="email" name="email" placeholder="Enter your email :">
                    </label>

                    <label for="submit">
                        <input type="submit" name="submit" value="SignUp" >
                    </label>
                </form>
            </div>

            <div class="signup-connect">
                <span>Have you already <a href="./login.php">registered</a> ?</span>
                <p>Connect with</p>
                <nav class="nav-2">
                    <a href=""><i class='bx bxl-facebook' ></i></a>
                    <a href=""><i class='bx bxl-google'></i></a>
                    <a href=""><i class='bx bxl-linkedin' ></i></a>
                </nav>
            </div>

        </div>
    </main>
</section>   

<?php require('./footer.php'); ?>        

