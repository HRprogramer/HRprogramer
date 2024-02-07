
<?php

session_start();

$conn = mysqli_connect('localhost' , 'PortfolioSQL' , 'Donava90' , 'portfoliodb');
$infotable = "info";
$posttable = "post";

// $Id = null;

if(!empty($_SESSION['user'])){

    $user = $_SESSION['user'];    
    $pass = $_SESSION['pass'];
    /////////// EDIT /////////////////


    $Uname = '';
    $job = '';
    $pass = '';
    $email = '';
    $city = '';
    $biu = '';

    // //****************************** */

    // $Job = "";
    // $Username = "";
    // $Password = "";
    // $Email = "";
    // $City = "";
    // $Biu = "";
    // $error = '';

    // /******************** */

    // $arror = array(
    //     'user'=> ' ',
    //     'pass'=> ' ',
    //     'email'=> ' ',
    //     'title'=>' ',
    //     'total'=> ' '
    // );
    
    $error_edit = null ; 

    if(!empty($_SESSION ['user'])){

        $sql = " SELECT * FROM $infotable WHERE Username LIKE '$user'";
        // $sql2 = " SELECT * FROM $infotable WHERE Password LIKE '$user',' $pass ' ";
        $result = mysqli_query($conn, $sql);

        if($result){
            $var = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if (!empty($var[0])){

                $Id = $var[0]['Id'];
                $Username = $var[0]['Username'];
                $Password = $var[0]['Password'];
                $Email = $var[0]['Email'];
                $City = $var[0]['City'];
                $Data = $var[0]['Data'];
                $Job = $var[0]['Job'];
                $Biu = $var[0]['Biu'];
            }
        }

        if(isset($_POST['submitinsert'])){
            
            // Username
            if(!empty($_POST['Uname'])){

                $pattern =  "/^[a-zA-Z\s\w]+$/";
                $userN = $_POST['Uname'];
                if (!preg_match($pattern, $userN)){
                    $error_edit  = '<p>Username must be just alpha numeric characters</p>';
                }else{
                    $Uname = $_POST['Uname'];
                }

            }else{

                $Uname = $Username;
            }

            //Job
            if(!empty($_POST['job'])){
                $job = $_POST['job'];

            }else{

                $job = $Job;
            }

            // PASSWORD
            if(!empty($_POST['pass'])){
                $pass = $_POST['pass'];
                
            }else{
                $pass = $Password;
            }

            // Email
            if(!empty($_POST['email'])){
                $email = $_POST['email'];
                if(!filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL)){
                    $error_edit  = '<p>Email must be in a correct form</p>';
                }
            }else{
                $email = $Email;
            }

            // City
            if(!empty($_POST['place'])){
                $city = $_POST['place'];
            }else{
                $city = $City;
            }

            //Biu
            if(!empty($_POST['Biu'])){
                $biu = $_POST['Biu'];
            }else{
                $biu = $Biu;
            }

            if($conn){

                // Inserting data into database
                $sql = " UPDATE $infotable SET Username ='$Uname' /*, Password='$pass' , Email ='$email' , City = '$city' , Job = '$job' , Biu = '$biu' */ WHERE Id = $Id";
                // $sql = " UPDATE $infotable SET Username = '$Uname' , Password='123' , Email ='m.m@gmail.com' , City = 'ghom' , Job = 'developer' , Biu = 'i am a student' WHERE id = 2";
                // $sql = "UPDATE $tablename SET Email = 'n.n@gmail.com' WHERE id= 2";
                // $sql = "UPDATE `info` SET `Username`='[]',`Password`='[value-3]',`Email`='[value-4]',`City`='[value-5]',`Job`='[value-6]',`Biu`='[value-7]',`Data`='[value-8]' WHERE 1";
                $result = mysqli_query($conn, $sql);

                if($result){
                    // mysqli_free_result($result);
                    mysqli_close($conn);
                    header('Location: user-panel.php');
                }
                else{
                    $error_edit  = '<p>There are some errors in inserting data into databse</p>';
                }
            }
        }
    }
    else{

    }


    ////////// POST ///////////


    if(isset($_POST['Confirm'])){

        if(!empty($_POST['text1'])){

            $title = $_POST['text1'];
        }
        else{
            $error['title'] = '<p>Title field required</p>';
        }

        if(!empty($_POST['box_text'])){
            $post = $_POST['box_text'];
        }
        else{
            $error['post'] = '<p>Text field required</p>';
        }

        if(!empty($_POST['text2'])){
            $labels = $_POST['text2'];
        }
        else{
            $error['Label'] = '<p>Label field required</p>';
        }
        echo "$Id, $title, $post , $labels";
        $sql = "INSERT INTO $posttable (ID , Title , Text , Labels) VALUES ('$Id', '$title', '$post' , '$labels')";
        $var = mysqli_query( $conn , $sql);
        if($var){

            // mysqli_free_result($var);
            mysqli_close($conn);
            header('Location: ../User/user-panel.php');
        }
        
    }elseif(isset($_POST['Cancel'])){
        
        header('Location: ../User/user-panel.php');
    }
}


    function post( $Database , $infotable , $posttable , $id){

        $conn = $Database;
        $Infotable = $infotable;
        $Posttable = $posttable;
        $Id = $id;

        $sql2= "SELECT * FROM $infotable WHERE Id LIKE '$id'";
        $result2 = mysqli_query($conn, $sql2);
        
        if($result2){
            $var2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
            if(!empty($var2[0]['Id'])){

                $Uname = $var2[0]['Username'];
                $job = $var2[0]['Job'];
            }
        }


        $sql1 = "SELECT * FROM $posttable WHERE ID LIKE '$id'";
        $result1 = mysqli_query($conn, $sql1);
        if ($result1){

            $var1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
            for($j = 0; $j < 20 ; $j++){

                if(!empty($var1[$j]['ID'])){

                    // $Uname = $var1[$j]['ID'];
                    // $job = $var1[$j]['Title'];
                    $post = $var1[$j]['Text'];
                    $labels = $var1[$j]['Labels'];

                    echo "
                    <div class='grid-item'>

                        <nav>
                            <h2> $Uname </h2>
                            <button type='button'>Delete</button>
                        </nav>
                        <div>
                            $post
                        </div>
                        <article>
                            $labels
                        </article>
                    </div>
                    ";
                }
            }
        }
    }

    function DEL( $Database , $tablename , $id){
        $conn = $Database;
        $Tablename = $tablename;
        $Id = $id;
        $sql = "DELETE * FROM $Tablename WHERE ID ='$id'";
        $result1 = mysqli_query($conn, $sql);
        if ($result){

            // <script>console.log('hello world');</script>
            echo "ttttttttttttttttttt";
        }
    }


?>
