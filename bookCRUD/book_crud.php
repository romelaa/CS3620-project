<?php
/**
 * Created by PhpStorm.
 * User: romelaazizyan
 * Date: 1/26/21
 * Time: 6:20 PM
 */


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$servername = "cs3620data.mysql.database.azure.com";

$username = (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] : $_ENV['SQLUSER']);
$password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLPW"] : $_ENV['SQLPW']);

$dbname = "cs3620";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT bookID, book, author FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table>";
        echo "<th>ID<th>
                <th>Book Name</th>
                <th>Author</th>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["bookID"]. " </td><td>" . $row["book"]. "</td><td>" . $row["author"]. "</td></tr>";
    }

    echo "</table>";

} else {
    echo "0 results";
}
if($_POST)
{
    $title = $_POST['title'];
    $author = $_POST['author'];


    $sql = "INSERT INTO books (book, author) VALUES ('$title','$author')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

?>


<!DOCTYPE html>
<html>
<body>

<h1>Add Book</h1>

<form method="post" >
    <label>Book Title</label>
    <input type="text" name="title" class='form-control'><br>

    <label>Author</label>
    <input type="text" name="author" class='form-control'><br>

    <input type="submit" name="save" value="submit">
</form>

<h1>Remove Book</h1>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>