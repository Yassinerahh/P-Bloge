<?php

class Register extends Database{

    public function registerUser($username, $email, $password, $confirm_password, $role){

        try{
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);

            // username or email has already been taken
            if(count($result) > 0){
                return 1;

            }else {
                if($password == $confirm_password){

                    $sql = "INSERT INTO users (email, username, password, role) VALUES ('$email', '$username', '$password', '$role')";
                    $statement = $this->conn->prepare($sql);
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_OBJ);

                    header("Location:login.php");
                    die();

                }
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        
    }

}