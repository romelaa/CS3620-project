<?php
class UserDAO {
    function getUser($user){
        require_once('./utilities/connection.php');

        $sql = "SELECT firstName, lastName, username, userID FROM users WHERE userID =" . $user->getUserId();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $user->setFirstName($row["firstName"]);
                $user->setLastName($row["lastName"]);
                $user->setUsername($row["username"]);
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function checkLogin($passed_username, $password){
        require_once('./utilities/connection.php');

        $user_id = 0;

        $sql = "SELECT userID FROM users WHERE username = '".$passed_username."' AND password = '".hash("sha256", $password)."' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $user_id = $row["userID"];
            }
        } else {
            echo "0 results";
            $user_id = 0;

        }
        $conn->close();
    }

    function createUser($user){
        echo "inserting";

        require_once('./utilities/connection.php');

        $sql = "INSERT INTO cs3620_proj.users
    (
    `username`,
    `password`,
    `firstName`,
    `lastName`)
    VALUES
    ('" . $user->getUsername() . "',
    '" . $user->getPassword() . "',
    '" . $user->getFirstName() . "',
    '" . $user->getLastName() . "'
    );";
        $result = $conn->query($sql);

        $conn->close();
    }
}