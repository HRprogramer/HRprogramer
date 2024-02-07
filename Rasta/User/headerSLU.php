<?php 
$adderss = " ";
$x = ' ';
$help = ' ';
$add = $_SERVER['SCRIPT_NAME'];

if($add ==='/Rasta/Sign&Log/Signup.php'){
    $adderss = 'Signup!';
    $x = '../Sign&Log/Login.php';
    $help = 'Login';
}
elseif($add ==='/Rasta/Sign&Log/Login.php'){
    $adderss = 'login!';
    $x = '../Sign&Log/Signup.php';
    $help = 'Signup';
}
else{
    $adderss = "Your Page!";
    $x = '../Sign&Log/Login.php';
    $help = 'Login';
}

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../Style/style.css">
        <script src="../JavaScript/Script.js"></script>
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
                <a href="../MainPage/main.php"><i class='bx bxs-home'></i><br><b>Home</b></a>
                <a href="<?php echo $x; ?>"><i class='bx bxs-user' ></i><br><b><?php echo $help; ?></b></a>
                </nav>
            </main>
        </header>
    </body>
</html>