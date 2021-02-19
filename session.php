<?php
require_once('./user/user.php');

class session {
    // Methods
    function login($username, $password) {
        $user = new User($username);

        if($user->checkLogin($username, $password)){
            session_start();
            $_SESSION["loggedIn"] = true;
        }

    }
}
?>