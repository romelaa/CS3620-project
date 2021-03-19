<!---->
<!---->
<!--<!DOCTYPE HTML>-->
<!--<html>-->
<!--<head>-->
<!--    <title>PDO - Read Records - PHP CRUD Tutorial</title>-->
<!---->
<!--    <!-- Latest compiled and minified Bootstrap CSS -->-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />-->
<!---->
<!--    <!-- custom css -->-->
<!--    <style>-->
<!--    .m-r-1em{ margin-right:1em; }-->
<!--    .m-b-1em{ margin-bottom:1em; }-->
<!--    .m-l-1em{ margin-left:1em; }-->
<!--    .mt0{ margin-top:0; }-->
<!--    </style>-->
<!---->
<!--</head>-->
<!--<body>-->
<!---->
<!--    <!-- container -->-->
<!--    <div class="container">-->
<!---->
<!--        <div class="page-header">-->
<!--            <h1>Read Products</h1>-->
<!--        </div>-->
<!---->
<!--        --><?php
//        /**
//         * Created by PhpStorm.
//         * User: romelaazizyan
//         * Date: 2/5/21
//         * Time: 9:02 PM
//         */
//        // include database connection
//
//        ini_set('display_errors', 1);
//        ini_set('display_startup_errors', 1);
//        error_reporting(E_ALL);
//
//        session_start();
//
//        $servername = "cs3620data.mysql.database.azure.com";
//
//        $username = (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] : $_ENV['SQLUSER']);
//        $password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLPW"] : $_ENV['SQLPW']);
//
//        $dbname = "cs3620_proj";
//
//        // Create connection
//        $conn = new mysqli($servername, $username, $password, $dbname);
//        // Check connection
//        if ($conn->connect_error) {
//            die("Connection failed: " . $conn->connect_error);
//        }
//
//        // delete message prompt will be here
//
//        // select all data
//        $query = "SELECT bookID, book, author FROM books";
//        $stmt = $conn->prepare($query);
//        $stmt->execute();
//
//        // this is how to get number of rows returned
//        $num = $stmt->num_rows();
//
//        // link to create record form
//        echo "<a href='book_crud.php' class='btn btn-primary m-b-1em'>Create New Product</a>";
//
//        //check if more than 0 record found
//        if($num>0){
//
//            echo "<table class='table table-hover table-responsive table-bordered'>";//start table
//
//            //creating our table heading
//            echo "<tr>";
//            echo "<th>ID</th>";
//            echo "<th>Book</th>";
//            echo "<th>Author</th>";
//            echo "</tr>";
//
//            // retrieve our table contents
//            // fetch() is faster than fetchAll()
//            // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
//            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//                // extract row
//                // this will make $row['firstname'] to
//                // just $firstname only
//                extract($row);
//
//                // creating new table row per record
//                echo "<tr>";
//                echo "<td>{$bookID}</td>";
//                echo "<td>{$book}</td>";
//                echo "<td>{$author}</td>";
//                echo "<td>";
//                // read one record
//                echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";
//
//                // we will use this links on next part of this post
//                echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
//
//                // we will use this links on next part of this post
//                echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
//                echo "</td>";
//                echo "</tr>";
//            }
//
//
//            // end table
//            echo "</table>";
//
//        }
//
//// if no records found
//        else{
//            echo "<div class='alert alert-danger'>No records found.</div>";
//        }
//        ?>
<!---->
<!--    </div> <!-- end .container -->-->
<!---->
<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->-->
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<!---->
<!--<!-- Latest compiled and minified Bootstrap JavaScript -->-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!---->
<!--<!-- confirm delete record will be here -->-->
<!---->
<!--</body>-->
<!--</html>-->


<?php

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

$conn->close();
?>