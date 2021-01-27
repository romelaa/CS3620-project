<?php
/**
 * Created by PhpStorm.
 * User: romelaazizyan
 * Date: 1/26/21
 * Time: 6:20 PM
 */

$servername = "cs3620data.mysql.database.azure.com";
$username = "romela@cs3620data";
$password = "Bookmarks77";
$dbname = "cs3620_proj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Shows (showID, showTitle)
VALUES (5, 'Criminal Minds')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>