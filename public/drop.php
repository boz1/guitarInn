<?php
$servername = "aws-thinkk-guitarinn.cejhr5mrittf.eu-central-1.rds.amazonaws.com";
$username ="boz1";
$password = "asdqwe123";
$dbname = "guitarInn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$userId = $_POST["userId"];
$guitarId = $_POST["guitarId"];

$sql = "DELETE FROM Favorites WHERE UserId = '$userId' AND GuitarId = '$guitarId'";



if ($conn->query($sql) === TRUE) {
    echo "Deleted from favorites successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>