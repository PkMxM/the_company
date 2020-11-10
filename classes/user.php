<?php
//include - if file not found, warning/ignore
//require - if file not found, error/stop
//include_once not include it again, if it is included already
//require_once not require it again, if it is required already
require_once "database.php";
class User extends Database {
    public function createUser($origin, $firstName,$lastName,$username,$password){
        $sql = "INSERT INTO users (first_name, last_name, username, `password`) VALUES ('$firstName' ,'$lastName' ,'$username')";

        //this->conn is the "protected $conn"from parent class
        if($this->conn->query($sql)){
            if($origin == "dashboard"){
            header("location:../views/dashboard.php"); 
            exit;
            }elseif($origin == "register") {
                header("location:../views"); //go to index/Log in page
                exit;
            }

             // //Alternate
            // if(basename($_SERVER['HTTP_REFERER']) == "dashboard.php"){
            //     header("location../views/dashboard.php");
            //     exit;
            // } else {
            //     header("location:../views"); //login
            //     exit;
            // }

        }else {
            die("Error creating user: " .$this->conn->error);
            
            }
        }   

    
    public function login($username, $password){
        $error = "The username or password you entered is inncorrect.";
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);
        if($result->num_rows == 1){
            $userDetails = $result->fetch_assoc();
            if(password_verify($password, $userDetails['password'])){
                session_start();
                //Create session id here
                $_SESSION['id'] = $userDetails['id'];
                $_SESSION['username'] = $userDetails['username'];

                header("location:../views/dashboard.php");
                exit;
            
            } else {
                echo $error;
            }
        } else {
            echo $error;
        }
    }
    public function getUsers(){
        $loginID = $_SESSION['id'];
        $sql ="SELECT * FROM users WHERE id != $loginID";

        if($result = $this->conn->query($sql)){
            return $result;
        } else {
            die ("Error retrieving users: " .$this->conn->error);
        }
    } 
    
    public function getUser($userID){
        $sql = "SELECT * FROM users WHERE id = '$userID'";

        if($result = $this->conn->query($sql)){
            $userDetails = $result->fetch_assoc();
            return $userDetails;
        } else {
            die ("Error retrieving users: " .$this->conn->error);
        }
    } 

    public function updateUser($userID,$firstName,$lastName,$username){
        $sql = "UPDATE users SET first_name = '$firstName', last_name = '$lastName', username = '$username' WHERE id = $userID";

        if($this->conn->query($sql)){
            header("location:../views/dashboard.php"); 
            exit;
        }else{
            die("Error updating user: " .$this->conn->error);    
        }
    }

    public function deleteUser($userID){
        $sql = "DELETE FROM users WHERE id = $userID";

        if($this->conn->query($sql)){
            header("location: dashboard.php");
            exit;
        } else {
            die("Error deleting user: " .$this->conn->error);
        }
    }
    
}