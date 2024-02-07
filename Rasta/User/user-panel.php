<script>
    var grid = docume
    console.log('Hi');
</script>
<?php

require ('./SQL.php');

$conn = mysqli_connect('localhost' , 'PortfolioSQL' , 'Donava90' , 'portfoliodb');
$tablename = "info";


?>

<?php require('./headerSLU.php'); ?>

<section class="user-panel">
    <main>

        <div class="user-panel-top">
            <div class="user-name">
                <h1><a href="">Notif</a><br><span>Like , Comment</span></h1>
            </div>

            <div class="followed">
                <h3><a href="">0</a><br><span>Followed</span></h3>
            </div>

            <div class="followers">
                <h3><a href="">0</a><br><span>Followers</span></h3>
            </div>

            <div class="Information">
                <h3>Your Profile<br><span><a href="./edit.php">Edit!</a></span></h3>
                <i class='bx bx-user'></i>
            </div>
        </div>

        <div class="user-panel-bottom">
            <h1>Activities</h1>
            <div class="Activities">
                <?php post($conn , $infotable, $posttable , $Id); ?>
            </div>
        </div>

    </main>
</section>
<section>
    <div class="addpost">
        <a href="../User/post.php"><i class='bx bxs-message-alt-add'></i></a>
    </div>
</section>

<?php require('../MainPage/footer.php') ?>