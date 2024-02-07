<?php

$conn = mysqli_connect('localhost' , 'PortfolioSQL' , 'Donava90' , 'portfoliodb');
$tablename = "info";

function GetInfo ($db, $Tablename){
    for($i=1 ; $i<50 ; $i++){
        $conn = $db;
        $tablename = $Tablename;

        $sql = "SELECT * FROM $tablename WHERE Id LIKE '$i'";
        $result = mysqli_query($conn, $sql);

        if($result){
            $var = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if (!empty($var[0])){

                $Id = $var[0]['Id'];
                $Username = $var[0]['Username'];
                $Pass = $var[0]['Password'];
                $Email = $var[0]['Email'];
                $City = $var[0]['City'];
                $Data = $var[0]['Data'];

                echo "
                    <tr>
                        <td> $Id </td>
                        <td> $Username </td>
                        <td> $Pass </td>
                        <td> $Email </td>
                        <td> $City </td>
                        <td> $Data </td>
                    </tr>";
            }
        }
    }

}    

function users($db, $Tablename){
    $j = 0;
    for($i=1 ; $i<50 ; $i++){
        $conn = $db;
        $tablename = $Tablename;

        $sql = "SELECT * FROM $tablename WHERE Id LIKE '$i'";
        $result = mysqli_query($conn, $sql);

        if($result){
            $var = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if (!empty($var[0])){
                $j++;
            }
        }
    }
    return $j;
}

function AddNewUser($db, $Tablename){

    for($i=1 ; $i<50 ; $i++){
        $conn = $db;
        $tablename = $Tablename;
        $sql = "SELECT * FROM $tablename WHERE Id LIKE '$i'";
        $result = mysqli_query($conn, $sql);

        if($result){
            $var = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if (!empty($var[0])){

                $Username = $var[0]['Username'];
                $City = $var[0]['City'];
              
                echo "<div><h3>$Username<br><span>$City</span></h3></div>";
            }
        }
    }
}

?>

<?php require('../MainPage/header.php'); ?>

<section class="admin">
    <div class="admin-top">
        <nav>
            <h3>1,504<br><span>Daily views</span></h3>
            <i><i class='bx bxs-show'></i></i>
        </nav>

        <nav>
            <h3><?php echo users($conn , $tablename); ?><br><span>Users</span></h3>
            <i><i class='bx bxs-group' ></i></i> 
        </nav>

        <nav>
            <h3>280<br><span>Comments</span></h3>
            <i><i class='bx bxs-chat'></i></i> 
        </nav>
    </div>

    <div class="admin-bottom">

        <div class="admin-bottom-left">

            <div class="admin-users">
                <h1>Users</h1>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Date</th>
                    </tr>
                    <?php GetInfo($conn , $tablename); ?>
                </table>
            </div>

            <div class="admin-comments">
                <h1>Comments</h1>
                <div>
                    <h3>Ali<br><span>Mashhad</span></h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam incidunt, facilis necessitatibus laudantium eos hic, ad vero nam sequi ut est, nobis earum quos maiores! Reiciendis illo harum nemo distinctio.</p>
                </div>
                <div>
                    <h3>Melika<br><span>Ghom</span></h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut similique facilis soluta rem vitae officia nulla excepturi necessitatibus reprehenderit ducimus magni numquam possimus, earum modi perspiciatis eum repellendus laboriosam quisquam.</p>
                </div>
                <div>
                    <h3>Reza<br><span>Mashhad</span></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, culpa dolorum? Eius voluptatum magni fuga quod non iure. Est explicabo, tempora rerum earum ex adipisci odio accusantium unde neque iure!</p>
                </div>
            </div>
        </div>

        <div class="admin-bottom-right">
            <h1>New Users</h1>
            <form action="">
                <label for="">
                    <input type="radio" name="radio" id=""><br>One month <br>
                    <input type="radio" name="radio" id=""><br>One week
                </label>
            </form>
            <?php AddNewUser($conn , $tablename); ?>
        </div>
    </div>
</section>

<?php require('../MainPage/footer.php'); ?>