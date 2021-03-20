<?php
class UserDAO {
    function getUser($user, $data, $method){
        require_once('./utilities/connection.php');

        $sql = "SELECT firstName, lastName, username, user_id FROM users WHERE " . $method . "=" . "'$data'";
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

        $sql = "SELECT user_id FROM users WHERE username = '".$passed_username."' AND password = '".hash("sha256", $password)."' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $user_id = $row["user_id"];
            }
        } else {
            echo "0 results";
            $user_id = 0;

        }
        $conn->close();
        return $user_id;
    }

    function createUser($user){
        echo "inserting";

        require_once('./utilities/connection.php');

        $sql = $conn->prepare("INSERT INTO cs3620.users
    (
    `username`,
    `password`,
    `first_name`,
    `last_name`)
    VALUES
    (?, ?, ?, ?)");

        $un = $user->getUsername();
        $pw = $user->getPassword();
        $fn = $user->getFirstName();
        $ln = $user->getLastName();


        $sql->bind_param("ssss", $un, $pw, $fn, $ln);
        $sql->execute();

        $sql->close();
        $conn->close();

    }

    function deleteUser($username){
        require_once('./utilities/connection.php');

        $sql = "DELETE FROM cs3620.users WHERE username = '" . $username . "';";
        $result = $conn->query($sql);

        $conn->close();

        echo "user deleted";
    }

    function setSessionFirstName($loggedinUser){
        include('./utilities/connection.php');

        $fn="";
        $sql = "SELECT first_name FROM users WHERE user_id = '" . $loggedinUser . "';";

        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while ($row=$result->fetch_assoc()){
                $fn=$row["first_name"];
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        return $fn;
    }

    function getFirstName($user, $userid){
        require_once('./Utiltities/connection.php');

        $sql = "SELECT first_name FROM users WHERE user_id = " . $userid;

        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $user->setFirstName($row["first_name"]);
                $user->setLastName($row["last_name"]);
                $user->setUsername($row["username"]);
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    }
}