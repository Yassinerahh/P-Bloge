<?php


class Login extends Database{

public function loginUser($username, $password){
    try{
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";

        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);

        if(count($result) > 0){
            if($result[0]->password == $password){

                    session_start();
                    $_SESSION['id'] = $result[0]->id;
                    $_SESSION['email'] = $result[0]->email;
                    $_SESSION['user_rank'] = $result[0]->role;
                    $_SESSION['user_name'] = $result[0]->username;
                    return 1;
                    

            }else{
                return 2;
            }
        }else{
            return 3;
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function logoutUser(){
    try{
        session_reset();
        session_destroy();

        return true;

    }catch(PDOException $e){
        echo $e->getMessage();
    } 
}

}