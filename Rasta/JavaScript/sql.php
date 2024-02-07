<?php 
$conn = mysqli_connect('localhost' , 'PortfolioSQL' , 'Donava90' , 'portfoliodb');
function u(){
    $s = "Hasan"; 
    // echo $s;
    return $s;
}

$sql = 'UPDATE info SET (Username) VALUES ("Hossein") WHERE Id = "1"';
// $sql = 'UPDATE info SET Username ='[value-2]',`Password`='[value-3]',`Email`='[value-4]',`City`='[value-5]',`Job`='[value-6]',`Biu`='[value-7]',`Data`='[value-8]' WHERE 1';
// $sql = "INSERT INTO info (Username) VALUE('$s') WHERE '1'";

$result = mysqli_query($conn, $sql);
if($result){
    echo "fetdshgvcskjzh";
}
?>