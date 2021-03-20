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
            $method = "user_id";
            $userDAO = new UserDAO();
            $userDAO->getUser($this, $user_id, $method);
            return $this;
        }

        function createUser(){
            $userDAO = new UserDAO();
            $userDAO->createUser($this);
        }

        function checkLogin($username, $password){
            $userDAO = new UserDAO();
            $userDAO->checkLogin($username, $password);
        }

        public function jsonSerialize(){
            $vars = get_object_vars($this);
            return $vars;
        }

        function getUserByFirstname($data){
            $this->firstName = $data;
            $method="first_name";
            $userDAO = new UserDAO();
            $userDAO->getUser($this,$data,$method);
        }

        function getUserByLastName($data){
            $this->lastName = $data;
            $method="last_name";
            $userDAO=new UserDAO();
            $userDAO->getUser($this,$data,$method);
        }

        function getUserByUsername($data){
            $this->username = $data;
            $method="username";
            $userDAO=new UserDAO();
            $userDAO->getUser($this,$data,$method);
        }

        function getFirstnameById($userID){
            $userDAO=new UserDAO();
            $userDAO->getFirstName($this,$userID);

            return $this->firstName;
        }

        function deleteUser($username){
            $userDAO=new UserDAO();
            $userDAO->deleteUser($username);
        }

        function setSessionFirstName($loggedinUser){
            $userDAO=new UserDAO();
            return $userDAO->setSessionFirstName($loggedinUser);

        }    }


?>