<?php

    require_once('./user/userDAO.php');

    Class User{
        private $userID;
        private $username;
        private $firstName;
        private $lastName;
        private $password;

        // Methods
        function __construct() {
        }
        function getUserId(){
            return $this->userID;
        }
        function setUserId($userID){
            $this->userID = $userID;
        }
        function getUsername() {
            return $this->username;
        }
        function setUsername($username){
            $this->username = $username;
        }
        function getFirstName() {
            return $this->firstName;
        }
        function setFirstName($firstName){
            $this->firstName = $firstName;
        }
        function getLastName() {
            return $this->lastName;
        }
        function setLastName($lastName){
            $this->lastName = $lastName;
        }

        function setPassword($password){
            $this->password = hash("sha256", $password);
        }

        function getPassword(){
            return $this->password;
        }

        function getUser($userID){
            $this->userID = $userID;
            $userDAO = new userDAO();
            $userDAO->getUser($this);
            return $this;
        }

        function createUser(){
            $userDAO = new userDAO();
            $userDAO->createUser($this);
        }

        function checkLogin($username, $password){
            $userDAO = new userDAO();
            $userDAO->checkLogin($username, $password);
        }

        public function jsonSerialize(){
            $vars = get_object_vars($this);
            return $vars;
        }


    }


?>