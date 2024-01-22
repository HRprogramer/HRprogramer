<?php 
$adderss = "";
$x = '';
$help = '';
$add = $_SERVER['SCRIPT_NAME'];

if($add ==='/portfolio111/component/signup.php'){
    $adderss = 'Signup!';
    $x = './login.php';
    $help = 'Login';
}
elseif($add ==='/portfolio111/component/login.php'){
    $adderss = 'login!';
    $x = './signup.php';
    $help = 'Signup';
}
else{
    $adderss = "Your Page!";
    $x = './login.php';
    $help = 'Login';
}

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../Style/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Header-log&sign</title>
    </head>

    <body>
        <header class="header-log-sign">
            <main>
                <div>
                    <h1><?php echo $adderss; ?></h1>
                </div>
                <nav>
                <a href="./main.php"><i class='bx bxs-home'></i><br><b>Home</b></a>
                <a href="<?php echo $x; ?>"><i class='bx bxs-user' ></i><br><b><?php echo $help; ?></b></a>
                </nav>
            </main>
        </header>
    </body>
</html>