<?php
session_start();
$var="";
$error = '';
$address='';

if(!empty($_SESSION['user'])){
    $var = 'Profile';
    $admin_info = array('user'=> 'Hossein', 'pass'=>123);
    $x = array('user'=>$_SESSION['user'] , 'pass'=> $_SESSION['pass']);
    if($x != $admin_info){

        $address = '../User/user-panel.php';
    }
    else{
        
        $address = '../Admin/admin-panel.php';
    }
}
else{
    $var = "Login";
}



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Style/style.css">
        <script src="../JavaScript/Script.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Porfolio</title>
    </head>

    <body>
        <header class="main-header">
            <main>
                <div>
                    <h1>RASTA</h1>
                    <p>A tool to better introduce ourselves to others</p>
                </div>
                <nav>
                    <a href="../MainPage/main.php"><i class='bx bxs-home'></i><br><b>Home</b></a>
                    <a href="../MainPage/explore.php"><i class='bx bxs-search-alt-2' ></i><br><b>Explore</b></a>
                    <a href="<?php echo $address ?>"><i class='bx bxs-user' ></i><br><b><?php echo $var; ?></b></a>
                </nav>
            </main>
        </header>
