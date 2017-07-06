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

$vote= $_POST["rating"];
$guitarId = $_POST["guitarId"];

$increment = 1;

$sql = "UPDATE Guitars SET TotalVote = TotalVote + '$vote', NumberOfVoters =  NumberOfVoters + '$increment' WHERE id= '$guitarId'";
//$sql = "UPDATE Guitars SET NumberOfVoters = NumberOfVoters + 1 WHERE id= '$guitarId'";


if ($conn->query($sql) === TRUE) {
    echo "Rated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>