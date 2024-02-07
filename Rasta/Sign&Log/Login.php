<?php
session_start();
$error = array(
        'user'=>'',
        'password'=>'',
        'total'=>''
    );
    
    
if (isset($_POST['submit'])){

    ////USERNAME////
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


    // Password
    if (empty($_POST['password'])){
        $error['password'] = '<p>Password field required</p>';
    }
    else { 
        $pass = $_POST['password'];         
    }


    if (array_filter($error)){
        $error['total'] = '<p>There are some errors in your form</p>';
    }
    else {
        $conn = mysqli_connect('localhost' , 'PortfolioSQL' , 'Donava90' , 'portfoliodb');
        if ($conn){

            // Searching data from database
            $sql = "SELECT * FROM info WHERE Username LIKE '$user'";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $var = mysqli_fetch_all($result, MYSQLI_ASSOC);

                if (($var[0]['Username'] == $user) && ($var[0]['Password'] == $pass)){
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    $_SESSION['user'] = $user;
                    $_SESSION['pass'] = $pass;

                    if(!empty($_SESSION['user'])){
                        $admin_info = array('user'=> 'Hossein', 'pass'=>123);
                        $x = array('user'=>$_SESSION['user'] , 'pass'=> $_SESSION['pass']);
                        if($x != $admin_info){
                            header('Location:../User/user-panel.php');
                        }
                        else{
                            header('Location: ../Admin/admin-panel.php');
                        }
                    }
                    else{
                        $var = "Login";
                    }
                }
                else {
                    $error['total'] = '<p>There are some errors in username and password</p>';
                }

            }
            else {
                $error['total'] = '<p>There are some errors in inserting data into databse</p>';
            }
        }
    }
}

?>

<?php require('../User/headerSLU.php'); ?>

<section id="login">
    <?php// echo $error['total']; ?>
    <div class="login">
        <div class="login-content">
            <div class="login-p">
                <h2>Hello Again<b><i>!</i></b></h2>
                <span>Welcome, I missed you<b><i>!</i></b> </span>
            </div>

            <div class="login-form">
                <form action="" method="post">
                    <div class="">
                        <?php echo $error['user']; ?>
                    </div>
                    <label for="name">
                        <input type="text" name=" user" placeholder="User name">
                    </label>
                    <div class="">
                        <?php echo $error['password']; ?>
                    </div>
                    <label for="password">
                        <input type="password" name="password" placeholder="password">
                    </label>
                    <div class="">
                        <?php echo $error['total']; ?>
                    </div>
                    <label for="submit">
                        <input type="submit" name="submit" value="Login" >
                    </label>
                </form>
            </div>

            <nav class="login-logo">
                <span>Not a member? <a href="./signup.php">Register now</a></span>
                <p>Connect with</p>
                <nav class="nav-2">
                    <a href=""><i class='bx bxl-facebook' ></i></a>
                    <a href=""><i class='bx bxl-google'></i></a>
                    <a href=""><i class='bx bxl-linkedin' ></i></a>
                </nav>
            </nav>
        </div>

        <div class="login-img">

        </div>
    </div>
</section>
<?php require('../MainPage/footer.php'); ?>